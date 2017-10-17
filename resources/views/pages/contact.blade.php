@extends('main')

@section('title', '| Contact')

@section('content')
<!-- header -->
<div class="contact-top">
<div class="container">
      <div class="contact">
          <div class="contact-down">
              <div class="contact-right">
                <div class="col-md-6 contact-left">
                  <h4 style="color: #474E5D;margin-top: 50px;">CONTACT-INFO</h4>
                    <h5>Any queries or suggestion please do contact us.</h5>
                        <address><br><br>
                          E-mail: <a href="mailto:info@example.com">mail@example.com<script cf-hash="f9e31" type="text/javascript">
                          /* <![CDATA[ */!function(){try{var t="currentScript"in document?document.currentScript:function(){for(var t=document.getElementsByTagName("script"),e=t.length;e--;)if(t[e].getAttribute("cf-hash"))return t[e]}();if(t&&t.previousSibling){var e,r,n,i,c=t.previousSibling,a=c.getAttribute("data-cfemail");if(a){for(e="",r=parseInt(a.substr(0,2),16),n=2;a.length-n;n+=2)i=parseInt(a.substr(n,2),16)^r,e+=String.fromCharCode(i);e=document.createTextNode(e),c.parentNode.replaceChild(e,c)}}}catch(u){}}();/* ]]> */</script></a><br>
                        </address>
                </div>
                <div class="col-md-6 contact-info">
                     
                       {!! Form::open(['route' => 'contacts.store', 'method' => 'POST']) !!}
                       {{ Form::label('name', 'Name: ') }}
                       {{ Form::text('name', 'NAME', ['onfocus' => 'this.value=""','onblur' => 'if (this.value == "") {this.value = "NAME"}']) }}
                       {{ Form::label('email', 'Email: ') }}
                       {{ Form::text('email', 'EMAIL', ['onfocus' => 'this.value=""','onblur' => 'if (this.value == "") {this.value = "EMAIL"}']) }}
                       {{ Form::label('message', 'Message: ') }}
                       {{ Form::textarea('message', 'MESSAGE', ['cols' => '70','rows' => '5','onfocus' => 'this.value=""','onblur' => 'if (this.value == "") {this.value = "MESSAGE"}']) }}
                        <div class="clearfix"> </div>
                       {{ Form::submit('Send', []) }}

                        {!! Form::close() !!}
                </div>
                <div class="clearfix"> </div>
                </div>
      </div>
</div>  
  </div>
</div>

<!-- 
      <div class="row">
        <div class="col-md-12">
          <h1>Contact Me</h1>
          <hr>
          <form action="{{ url('contact') }}" method="POST">
          {{ csrf_field() }}
            <div class="form-group">
              <label name="email">Email:</label>
              <input id="email" name="email" class="form-control">
            </div>

            <div class="form-group">
              <label name="subject">Subject:</label>
              <input id="subject" name="subject" class="form-control">
            </div>

            <div class="form-group">
              <label name="message">Message:</label>
              <textarea id="message" name="message" class="form-control">Type your message here...</textarea>
            </div>

            <input type="submit" value="Send Message" class="btn btn-success">
          </form>
        </div>
      </div>
 -->
@endsection