<div class="navbar navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainmenu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/shops">Bolt értékelő oldal</a>
    </div>
    <div class="collapse navbar-collapse" id="mainmenu">
      <ul class="nav navbar-nav">
        <li @if (Request::is('shops')) class="active" @endif>
          <a href="/shops"><i class="fa fa-home"></i> Boltok</a>
        </li>
        <li @if (Request::is('shops/create')) class="active" @endif>
          <a href="/shops/create"><i class="fa fa-file"></i> Új bolt hozzáadása</a>
        </li>
      </ul>
    </div>
  </div>
</div>