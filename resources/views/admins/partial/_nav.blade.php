<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/browse"><b style="font-size: 25px;margin-right: 10px;margin-left: 15px;">How ?</b></a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu message-dropdown">
            @inject('messages', 'App\Http\Controllers\AdminController')

            <?php $messages = $messages->messages(); ?>
            
            @foreach($messages as $message)
                <li class="message-preview">
                    <a href="#">
                        <div class="media">
                            <span class="pull-left">
                                <img class="media-object" src="http://placehold.it/50x50" alt="">
                            </span>
                            <div class="media-body">

                                <h5 class="media-heading"><strong>{{ $message->name }}</strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> {{ $message->created_at }}</p>
                                <p>
                                {{   substr($message->message, 0, 20)  }}
                                {{ strlen($message->message) > 20 ? "..." : "" }}</p>

                                <h5 class="media-heading"><strong>John Smith</strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-preview">
                    <a href="#">
                        <div class="media">
                            <span class="pull-left">
                                <img class="media-object" src="http://placehold.it/50x50" alt="">
                            </span>
                            <div class="media-body">
                                <h5 class="media-heading"><strong>John Smith</strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-preview">
                    <a href="#">
                        <div class="media">
                            <span class="pull-left">
                                <img class="media-object" src="http://placehold.it/50x50" alt="">
                            </span>
                            <div class="media-body">
                                <h5 class="media-heading"><strong>John Smith</strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                <p>Lorem ipsum dolor sit amet, consectetur...</p>

                            </div>
                        </div>
                    </a>
                </li>

            @endforeach
                <li class="message-footer">
                    <a href="{{ route('contacts.index') }}">Read All New Messages</a>
 
                <li class="message-footer">
                    <a href="#">Read All New Messages</a>
 
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu alert-dropdown">
    

                @inject('alerts', 'App\Http\Controllers\AdminController')

                <?php $alerts = $alerts->alerts(); ?>
                @foreach($alerts as $alert)
                <li>
                    <a href="{{ route('alerts.index') }}"><span class="label label-{{ $alert->type }}">{{ $alert->title }}</span><br>{{ $alert->message }}</a>
                </li>
                @endforeach
                <li class="divider"></li>
                <li>
                    <a href="{{ route('alerts.index') }}">View All</a>
    
                <li>
                    <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">View All</a>
    
                </li>
            </ul>
        </li>
        <li class="dropdown">
    
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="{{ route('profile.show', Auth::user()->id) }}"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="{{ route('contacts.index') }}"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
    
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
    
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-power-off"></i> Log Out</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="{{ Request::is('admin') ? "active" : "" }}">
                <a href="/admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="{{ Request::is('posts') ? "active" : "" }}">
    
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-file"></i> Posts <span style="margin-right: 110px;"></span><i class="fa fa-fw fa-caret-down"></i></a>
    
                <ul id="demo" class="collapse">
                    <li>
                        <a href="{{ route('posts.index') }}">Show Posts</a>
                    </li>
                    <li>
                        <a href="{{ route('posts.create') }}">Create</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('categories') ? "active" : "" }}">
                <a href="{{ route('categories.index') }}"><i class="fa fa-fw fa-tasks"></i> Category</a>
            </li>
            <li class="{{ Request::is('tags') ? "active" : "" }}">
                <a href="{{ route('tags.index') }}"><i class="fa fa-fw fa-tags"></i> Tags</a>
            </li>
    
            <li class="{{ Request::is('skills') ? "active" : "" }}">
                <a href="{{ route('skills.index') }}"><i class="fa fa-fw fa-code"></i> Skills</a>
            </li>
            <li class="{{ Request::is('comments') ? "active" : "" }}">
                <a href="{{ route('comments.index') }}"><i class="fa fa-fw fa-comments"></i> Comments</a>
            </li>
            <li class="{{ Request::is('users') ? "active" : "" }}">
                <a href="{{ route('users.index') }}"><i class="fa fa-fw fa-users"></i> Users</a>
            </li>
            <li class="{{ Request::is('contacts') ? "active" : "" }}">
                <a href="{{ route('contacts.index') }}"><i class="fa fa-fw fa-envelope"></i> Messages</a>
            </li>
            <li class="{{ Request::is('alerts') ? "active" : "" }}">
                <a href="{{ route('alerts.index') }}"><i class="fa fa-fw fa-bell"></i>Alerts</a>
            </li>
            <?php $check = Auth::user()->admin; 
            if ($check != 0) { ?>
                <li class="{{ Request::is('pages') ? "active" : "" }}">
                    <a href="{{ route('pages.index') }}"><i class="fa fa-fw fa-file"></i> Pages</a>
                </li>
            <?php
            }
            ?>
    
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>