# Adapter Concretes
Each schema will have it's own concrete that extends the base adapter class. This is mainly for the purpose of providing a simplified configuration.

## AdapterAbstract
Placeholder class for this proposal. We can utilize existing EMRCore adapter or zend adapter or whatever is the best foot forward.

## AdapterAwareInterface
<Adapter>AwareInterfaces should extend this base interface so they all share the same setter/getter which simplifies ScriptAbstract usage. Some scripts will require more than one adapter, so you should also provide <Adapter>AwareCompatibleInterface which defines getter/setters with more specific names that won't conflict with other adapter DI interfaces.

### MasterAwareInterface
A sample (for Master schema) for the typical DI interface that will supply the average Script an adapter.

### MasterAwareCompatibleInterface
An additional DI interface that implements getter/setter names that wont conflict with other adapter DI interfaces. Used by complex Scripts that require multiple adapters.

### AppAwareInterface
A sample (for App schema) for the typical DI interface that will supply the average Script an adapter.

### AppAwareCompatibleInterface
An additional DI interface that implements getter/setter names that wont conflict with other adapter DI interfaces. Used by complex Scripts that require multiple adapters.