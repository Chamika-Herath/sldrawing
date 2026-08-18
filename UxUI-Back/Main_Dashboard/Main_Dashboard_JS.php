<script type="text/javascript">
    function setSidebarActive(pageName) {
        document.querySelectorAll('.wwjm-sidebar-nav-item').forEach(function(item){
            item.classList.toggle('wwjm-sidebar-active', item.getAttribute('data-page') === pageName);
        });
    }

    function Main_dashboard_close_all() {
        document.getElementById("Main_Dashboard_01_A").style.display = "none";
        document.getElementById("Main_Dashboard_02_A").style.display = "none";
        document.getElementById("Main_Dashboard_03_A").style.display = "none";
        
    }

    function Main_Dashboard_01_A_OPEN() { 
        Main_dashboard_close_all();
        document.getElementById("Main_Dashboard_01_A").style.display = "";
        setSidebarActive('dashboard');
        
    }

    function Main_Dashboard_02_A_OPEN() { 
        Main_dashboard_close_all();
        document.getElementById("Main_Dashboard_02_A").style.display = "";
        setSidebarActive('members');
        
    }

    function Main_Dashboard_03_A_OPEN() { 
        Main_dashboard_close_all();
        document.getElementById("Main_Dashboard_03_A").style.display = "";
        setSidebarActive('projects');
        
    }

 
   
  

    

    
</script>