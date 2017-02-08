<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/">
                {!! HTML::image(asset('/images/logo.png'), 'Teste Php', ['class' => 'center-block']) !!}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
        
             <div class="collapse navbar-collapse" id="myNavbar">
            
             <ul class="nav navbar-nav navbar-right">
                    <div class="btn btn-lg" style="margin-top: 5px;font-size: 20px;">
                        {!! HTML::link('/', '',['class' => 'glyphicon glyphicon-home white']) !!}
                    </div>
                    <div class="btn btn-lg" style="margin-top: 5px;font-size: 20px;">
                        {!! HTML::link('/auth/logout', '',['class' => 'glyphicon glyphicon-log-out white']) !!}
                    </div>
            </ul>
        </div>
        </div>
    </div>

</nav>