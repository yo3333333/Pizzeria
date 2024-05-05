<style>
    button {
        padding: 5px 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 3px;
    }
</style>

<button onclick="window.location.href='/pedido/{{ $pedidos->id }}/edit'">Editar</button>
