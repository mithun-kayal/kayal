
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Menu</li>
                <li> 
                    <a href="?home" class="waves-effect">
                        <i class="mdi mdi-home"></i>
                        <span> Dashboard <span class="badge badge-primary pull-right">1</span></span>
                    </a>
                </li>
                <li class="has_sub"> <a href="javascript:void(0);" class="waves-effect">
                    <i class="mdi mdi-google-pages"></i> <span> Pages </span> 
                    <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="?user">Users <i id="usersCountNomber" class="fl-right"></i></a></li>
                        <li><a href="?timeline">Timeline</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    
    <script>
      $(document).ready(function() {
          function dashBordListActive(){
            var getPageState = $("#getPageState").text();
            if(getPageState){
              var getElement = $('[href="?'+getPageState+'"]');
              $("#sidebar-menu").find('.active').each(function() {
                $(this).removeClass("active");
              });
              $("#sidebar-menu").find('.menu-open').each(function() {
                $(this).removeClass("menu-open");
              });
              getElement.parent().addClass("active");
              getElement.addClass("active");
              var getParent = getElement.parents(".has_sub");
              getParent.addClass("active menu-open");
              getParent.find('.waves-effect').each(function() {
                $(this).addClass("active");
              });
            }
          }
          dashBordListActive();
      })
    </script>

</div>