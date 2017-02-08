@extends('app')
 
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>{{ \Auth::user()->nome }}, Bem vindo ao Test Php</h4>
                </div>
            </div>
        </div>

	<div class="container-fluid" style="padding: 0;">
		<div class="row">
                    <div id="result"></div>
		</div>
	</div>
@endsection

@section('js')
<script>
        GoogleRss();
        setInterval(GoogleRss, 30000);
        function GoogleRss(){
                $.get('/google_rss', function(data) {
                    var $feed = data;
                    if($feed.success){
                        var html = '';
                        for(var i = 0; i < $feed.lenght-1; i++) {
                           var item = $feed[i];

                            html += '<div class="panel panel-primary" style="margin:auto; margin-bottom:15px; width:95%;">'
                            + '<div class="panel-heading">'
                            + '<h3 class="panel-title"><span class="glyphicon glyphicon-globe"/> '
                                + item.title
                            + '</h3>'
                            + '</div><!--End panel heading-->'
                            + '<div class="panel-body">';
                            if(item.image!=null){
                              html += '<img src="'+item.image+'" style="padding:5px;"/>'
                            }
                            html +=  item.story
                            + '</div><!--End panel body-->'
                            + '<div class="panel-footer">'
                            + '<span class="glyphicon glyphicon-eye-open"/> <a href="' + item.link + '" target=blank>'
                            + item.title
                            + '</a>'
                            + '</div><!--End panel footer-->'
                            + '</div><!--End panel primary-->';
                        }
                       jQuery('#result').append(html);
                   }
                });
            }
            
        
</script>
@endsection
