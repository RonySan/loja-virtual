<aside style="
    width: 220px;
    background: #0f0f0f;
    height: 100vh;
    position: fixed;
    left: 0;
    top: 0;
    padding-top: 25px;
    border-right: 2px solid #c9a100;
">
    <h2 style="
        color: #c9a100;
        text-align: center;
        margin-bottom: 30px;
    ">ADEGA STORE</h2>

    <nav style="display: flex; flex-direction: column; padding: 10px;">
        <a href="{{ url('/admin/categorias') }}" style="padding: 10px 0; color: #e5e5e5;">Categorias</a>
        <a href="{{ url('/admin/produtos') }}" style="padding: 10px 0; color: #e5e5e5;">Produtos</a>
        <a href="{{ url('/admin/estoque') }}" style="padding: 10px 0; color: #e5e5e5;">Estoque</a>
        <a href="#" style="padding: 10px 0; color: #e5e5e5;">Vendas</a>
        <a href="#" style="padding: 10px 0; color: #e5e5e5;">Clientes</a>
    </nav>
</aside>
