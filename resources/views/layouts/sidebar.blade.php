
    <header class="header" id="header">
        <div class="header_toggle"> 
            <i class="bi bi-list" id="header-toggle"></i> 
        </div>
        <div> 
            <i class="bi bi-person"></i> 
            {{-- {{auth()->user()->username}} --}}
        </div>
        </header>
        <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="#" class="nav_logo"> 
                    <i class="bi bi-layers nav_logo-icon"></i> 
                    <span class="nav_logo-name">ISP</span> 
                </a>
            <div class="nav_list" id="nav_list">
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
            </div>
            
        </a>
        
    
        </nav>
        </div>
        


