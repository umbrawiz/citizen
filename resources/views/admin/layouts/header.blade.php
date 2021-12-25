 <!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="javascript:void(0)" onclick="showListDeclaration()">CITIZENV</a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right">
        <li class="nav-item" style="margin-right:2rem;" id="form-search-declaration">
            <form class="form-inline" id="form-search-declaration">
                <div class="input-group">
                  <input type="text" class="form-control" id="declaration-name" placeholder="Search">
                  <div class="input-group-btn">
                    <button class="btn btn-primary" type="button" id="search-declaration">
                      <i class="glyphicon glyphicon-search"></i>
                    </button>
                  </div>
                </div>
            </form>
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="{{ route('admin.handle.logout') }}"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    @include('admin.layouts.menu')
    <!-- /.navbar-static-side -->
</nav>
<script>
    $('#form-search-declaration').keydown(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            return false;
        }
    });
    $("#search-declaration").click(function() {
        var declaration_name = $("#declaration-name").val();
        $.ajax({
            url: '/api/declaration/search',
            type: 'GET',
            data: {
                'declaration_name' : declaration_name
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            },
            success: function(response) {
                if(response.status == 200) {
                    window.history.pushState('', '', '/declaration/search?q='+declaration_name);
                    $('#page-wrapper').html(response.data);
                    $('#dataTables-search').DataTable();
                }
            }
        });
    });
</script>
