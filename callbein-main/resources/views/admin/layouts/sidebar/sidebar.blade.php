<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('admin/assets/img/logo/mcllogo.jpg') }}" />
        </div>
        <div class="sidebar-brand-text mx-3">BEIN&CALL</div>
    </a>
    <hr class="sidebar-divider my-0" />
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#guestinfo" aria-expanded="true" aria-controls="guestinfo">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Guest Information</span>
        </a>
        <div id="guestinfo" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('guest-info') }}">All </a>
                <a class="collapse-item" href="{{ route('add-guest') }}">Add Guest</a>
            </div>
        </div>
    </li>
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#bein" aria-expanded="true" aria-controls="bein">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Bein Program</span>
        </a>
        <div id="bein" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('bein') }}">Bein Program Form</a>
                <a class="collapse-item" href="{{ route('bein.all-program') }}">All Program</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#beinRequisition" aria-expanded="true" aria-controls="beinRequisition">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Bein Requisition</span>
        </a>
        <div id="beinRequisition" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('bein-requisition') }}">Requisition Form</a>
                <a class="collapse-item" href="{{ route('bein.all-requisition') }}">All Requisition</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#beinprocurement" aria-expanded="true" aria-controls="beinprocurement">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Bein Procurements</span>
        </a>
        <div id="beinprocurement" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('bein-procurement') }}">Procurement</a>
            </div>
        </div>
    </li>

    @if (Auth::user() -> role == '1')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.expense')}}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Admin Accounts</span>
        </a>
    </li>
    @endif
    
    @if (Auth::user() -> role == '1')
    <li class="nav-item">
        <a class="nav-link" href="{{route('product.pricing')}}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Product Pricing</span>
        </a>
    </li>
    @endif
    
    <li class="nav-item">
        <a class="nav-link" href="{{route('amount.collection')}}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Amount Collection</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('return.management')}}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Return Management</span>
        </a>
    </li>
    <hr class="sidebar-divider" />


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productlist" aria-expanded="true" aria-controls="productlist">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Product</span>
        </a>
        <div id="productlist" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('add-company')}}">Company</a>
                <a class="collapse-item" href="{{route('add-category')}}">Product Category</a>
                <a class="collapse-item" href="{{route('add-brand')}}">Product Brand</a>
                <a class="collapse-item" href="{{route('add-product-source')}}">Product Source</a>
                <a class="collapse-item" href="{{route('add-product')}}">Add Product</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('money-Disburse')}}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Money Disburse</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('inventory-entry')}}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Inventory Entry</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('cheque-management')}}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Cheque Management</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('deliveryman-registration')}}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Delivery Man</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productdeliverylist" aria-expanded="true" aria-controls="productdeliverylist">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Product Delivery</span>
        </a>
        <div id="productdeliverylist" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('product-delivery') }}">Product Delivery</a>
                <a class="collapse-item" href="{{ route('chalan-view') }}">All Chalan</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('delivery-information')}}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Delivery Information</span>
        </a>
    </li>
</ul>