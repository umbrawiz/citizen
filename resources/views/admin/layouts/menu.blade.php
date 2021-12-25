<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li id="admins">
                <a href="#"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Người dùng<span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="javascript:void(0)" onclick="showListAdmin()">Danh sách</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li id="province">
                <a href="#"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Tỉnh/Thành phố<span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="javascript:void(0)" onclick="showListProvince()">Danh sách</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li id="district">
                <a href="#"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Quận/Huyện<span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="javascript:void(0)" onclick="showListDistrict()">Danh sách</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li id="ward">
                <a href="#"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Xã/Phường<span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="javascript:void(0)" onclick="showListWard()">Danh sách</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li id="village">
                <a href="#"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Ấp/Làng<span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="javascript:void(0)" onclick="showListVillage()">Danh sách</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Thân nhân<span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="javascript:void(0)" onclick="showListDeclaration()">Danh sách</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Thống kê dân số<span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li id="report-province">
                        <a href="javascript:void(0)" onclick="showReportProvince()">Tỉnh/Thành phố</a>
                    </li>
                    <li id="report-district">
                        <a href="javascript:void(0)" onclick="showReportDistrict()">Quận/Huyện</a>
                    </li>
                    <li id="report-ward">
                        <a href="javascript:void(0)" onclick="showReportWard()">Xã/Phường</a>
                    </li>
                    <li id="report-village">
                        <a href="javascript:void(0)" onclick="showReportVillage()">Ấp/Làng</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>


<script>
    $(document).ready(function() {

        const list = [
            'admins',
            'province',
            'district',
            'ward',
            'village',
            'declaration',
            'search-declaration',
            'report-province',
            'report-district',
            'report-ward',
            'report-village'
        ];

        list.forEach(function(item) {
            $('#' + item).hide();
        });

        const user = JSON.parse(localStorage.getItem('user'));

        $.ajax({
            url: '{{ route("api.auth.check") }}',
            type: 'POST',
            data: {
                username: user.username,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            },
            success: function(response) {

                if (response.status == 200) {

                    const roles = response.data.role;

                    roles.forEach(role => {
                        if (role.name.split('.')[1] == 'list') {
                            list.forEach(function(item) {
                                role.name.split('.')[0] == item ? $('#' + item)
                                    .show() : '';
                            });
                        }
                    });
                }
            }
        });
    });
</script>
