<div class="sidebar">
    <div class="top-logo">
        <img src="/admin/assets/img/light-logo.png" alt="">
    </div>
    <div class="list-links">
        <ul class="list-unstyled">
            <li>
                <a href="#"><img src="/admin/assets/img/icon.png" alt="icon"> Create new event </a>
            </li>
            <li>
                <a
                    href="#"
                >
                    <img src="/admin/assets/img/icon.png" alt="icon"> Events List</a>
            </li>
            <li>
                <a
                    href="{{route('admin.owners.index')}}"
                    class="{{request()->routeIs('admin.owners.index') ? 'active' : ''}}"
                >
                    <img src="/admin/assets/img/icon.png" alt="icon"> Owners</a>
            </li>
            <li>
                <a
                    href="{{route('admin.sponsors.index')}}"
                    class="{{request()->routeIs('admin.sponsors.index') ? 'active' : ''}}"
                >
                    <img src="/admin/assets/img/icon.png" alt="icon"> Sponsors</a>
            </li>
            <li>
                <a href="#"><img src="/admin/assets/img/icon.png" alt="icon"> Speakers</a>
            </li>
            <li>
                <a href="#"><img src="/admin/assets/img/icon.png" alt="icon"> Users List</a>
            </li>
            <li>
                <a href="#"><img src="/admin/assets/img/icon.png" alt="icon"> Discounts</a>
            </li>
            <li>
                <a href="#"><img src="/admin/assets/img/icon.png" alt="icon"> Payments & Invoices</a>
            </li>
        </ul>
    </div>
</div>
