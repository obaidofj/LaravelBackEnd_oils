<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('root') }}">مشحمة زيتون</a>
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('admin.create') }}">اضافة اعلانات</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('admin.toedit') }}">تعديل على الاعلانات</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('addCustomer') }}">اضافة زبون</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('addCar') }}">اضافة سيارة</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('jobTypes') }}">انواع الوظائف</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('addMaintinance') }}">عمل صيانة لسيارة</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('jobTypes') }}">انواع الوظائف</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('cutomers-jobs') }}">ربط زبائن مع وظائف</a></li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>
