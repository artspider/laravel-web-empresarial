<x-layouts.main>
  <h1>Estas logueado</h1>
  @role('admin')
  <x-utils.subtitle>Hola admin!</x-utils.subtitle>
  @else
  <x-utils.subtitle>No eres admin!</x-utils.subtitle>
  @endrole

  <ul>
    @can('user.show')
    <li>Usuarios</li>
    @endcan

    @can('category.show')
    <li>Categorias</li>
    @endcan

    @can('dish.show')
    <li>Platillos</li>
    @endcan

    @can('customer.show')
    <li>Clientes</li>
    @endcan

    @can('product.show')
    <li>Productos</li>
    @endcan

    @can('order.show')
    <li>Ordenes</li>
    @endcan
  </ul>

</x-layouts.main>