@include('header')
<article>
    <div id="content">
        @include('UserManagement.userHeader')
        <section id="floorplan">
            <div class="florplan recnt">
                <div class="container">
                    <div class="flrpln clearfix">
                        <div class="flrheds clearfix">
                            <div class="flrhed">
                                <h1>Permissions </h1>
                            </div>
                        </div>
                    </div>
                    <?php $sections = DB::table('permissions')->get();?>
                    <?php $roles = DB::table('roles')->where('id', '!=', 1)->get();?>
                    <div class="actvty7">
                        {{ Form::open(array('action' => 'Permission_roleController@store', 'method' => 'POST','id'=>'form')) }}
                        <table class="roltbl">
                            <tr>
                                <th>Sections</th>
                                @foreach($roles as $role)
                                <th>{{ $role->title }}</th>
                                @endforeach
                            </tr>
                            @foreach($sections as $section)
                            <tr>
                                <td>{{ $section->title  }}</td>
                                @foreach($roles as $rol)
                                <?php $users = DB::table('permission_role')->where('role_id', $rol->id)->where('permission_id', $section->id)->get();?>
                                <td>
                                    <div class="chk">
                                        <div class="chk7 {{ (count($users)>0) ?" chkd":"" }}">
                                            <input type="checkbox" class="chek7" name="roles[]" value="{{ $rol->id }},{{ $section->id }}" {{ (count($users)>0) ?"checked":"" }} ><span class="chks"></span>
                                        </div>
                                    </div>
                    </td>
                    @endforeach
                    </tr>
                    @endforeach
                    </table>
                    <div class="updt">
                        <div class="amtantn">
                            <input type="submit" class="smits7" value="submit">
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
    </div>
    </section>
    </div>
</article>
@include('footer')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
{{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/vendor/jquery-1.12.0.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/main.js"></script>
<script src="js/vendor/jquery-1.12.0.min.js"></script>
<script src="js/main.js"></script>
<script>
    $(function() {
        $(".chek7").on('click', function(e) {
            // e.preventDefault();
            $(this).parent().toggleClass('chkd');
        });
    });
</script>
