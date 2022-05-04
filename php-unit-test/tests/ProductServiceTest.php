<?php

namespace Mamlzy\Test;

use Exception;
use PHPUnit\Framework\TestCase;

class ProductServiceTest extends TestCase
{
  private ProductRepository $repository;
  private ProductService $service;

  protected function setUp(): void
  {
    $this->repository = $this->createStub(ProductRepository::class);
    $this->service = new ProductService($this->repository);
  }

  public function testStub()
  {
    $product1 = new Product();
    $product1->setId('1');

    $product2 = new Product();
    $product2->setId('2');

    $map = [
      ['1', $product1],
      ['2', $product2],
    ];

    $this->repository->method('findById')->willReturnMap($map);

    self::assertSame($product1, $this->repository->findById('1'));
    self::assertSame($product2, $this->repository->findById('2'));
  }

  public function testStubCallback()
  {
    $this->repository->method('findById')
      ->willReturnCallback(function (string $id) {
        $product = new Product();
        $product->setId($id);

        return $product;
      });

    self::assertEquals('1', $this->repository->findById(1)->getId());
    self::assertEquals('2', $this->repository->findById(2)->getId());
    self::assertEquals('3', $this->repository->findById(3)->getId());
  }

  public function testRegisterSuccess()
  {
    $this->repository->method('findById')->willReturn(null); //! not unique
    $this->repository->method('save')->willReturnArgument(0); //! save success

    $product = new Product();
    $product->setId('1');
    $product->setName('Example Product');

    $result = $this->service->register($product);

    self::assertEquals($product->getId(), $result->getId());
    self::assertEquals($product->getName(), $result->getName());
  }

  public function testRegisterException()
  {
    $this->expectException(Exception::class);

    $productInDb = new Product();
    $productInDb->setId('1');

    $this->repository->method('findById')->willReturn($productInDb);

    $product = new Product();
    $product->setId('1');

    $this->service->register($product);
  }

  public function testDelete()
  {
    $product = new Product();
    $product->setId('1');

    $this->repository->method('findById')->willReturn($product);

    $this->service->delete('1');
    self::assertTrue(true, 'Deleted Successfully');
  }

  public function testDeleteFailed()
  {
    $this->expectException(Exception::class);
    $this->repository->method('findById')->willReturn(null);

    $this->service->delete('1');
  }
}
