
    <header class="header" id="header">
        <div class="header_toggle"> 
            <i class="bi bi-list" id="header-toggle"></i> 
        </div>
        <div>
        {{auth()->user()->name}} 
        </div>
        <div> 
             
                <form action="{{ route('logout') }}" method="post" id="logout-form" >
                @csrf
                <button class="btn btn-primary" style=" border: none; padding: none; background:none; margin:none; color:black">
                <i class="bi bi-box-arrow-in-left nav_icon"></i> 
            <span class="nav_name">LogOut</span> 
                </button>
                </form>
            
            
            
        </div>
        </header>
        <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a  class="nav_logo"> 
                    <i class="bi bi-layers nav_logo-icon"></i> 
                    <span class="nav_logo-name">DASARATA</span> 
                </a>
            <div class="nav_list" id="nav_list">
                @can('isSales')
                @if($title == 'dashboard') 
                <a href="{{url('sales')}}" class="nav_link active"> 
                @else
                <a href="{{url('sales')}}" class="nav_link"> 
                    @endif
                <i class="bi bi-grid-1x2-fill nav_icon"></i> 
                    <span class="nav_name">Dashboard</span> 
                </a> 

                @if($title == 'customer prospect') 
                <a href="{{url('customer_prospect')}}" class="nav_link active"> 
                @else
                <a href="{{url('customer_prospect')}}" class="nav_link"> 
                    @endif
                <i class="bi bi-person-dash nav_icon"></i> 
                    <span class="nav_name">Customer Prospect</span> 
                </a> 

                @if($title == 'customer closing') 
                <a href="{{url('customer_closing')}}" class="nav_link active"> 
                @else
                <a href="{{url('customer_closing')}}" class="nav_link"> 
                    @endif
                <i class="bi bi-person-check nav_icon"></i> 
                    <span class="nav_name">Customer Closing</span> 
                </a> 
                
               
                @else
                @if($title == 'dashboard') 
                <a href="{{url('sales')}}" class="nav_link active"> 
                @else
                <a href="{{url('sales')}}" class="nav_link"> 
                    @endif
                <i class="bi bi-grid-1x2-fill nav_icon"></i> 
                    <span class="nav_name">Dashboard</span> 
                </a> 
                @endcan
            
                
            </div>
            
        </a>
        
    
        </nav>
        </div>
        


