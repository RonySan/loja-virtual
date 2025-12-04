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
        <a href="{{ route('admin.categories.index') }}" style="padding: 10px 0; color: #e5e5e5;">Categories</a>
        <a href="{{ route('admin.products.index') }}" style="padding: 10px 0; color: #e5e5e5;">Products</a>
        <a href="{{ url('/admin/stock') }}" style="padding: 10px 0; color: #e5e5e5;">Stock</a>
        <a href="#" style="padding: 10px 0; color: #e5e5e5;">Sales</a>
        <a href="#" style="padding: 10px 0; color: #e5e5e5;">Clients</a>
    </nav>
</aside>
