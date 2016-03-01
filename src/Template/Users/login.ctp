<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JIPA - Login</title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('sb-admin-2') ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css') ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                		<?= $this->Flash->render() ?>
                        <div class="col-sm-12">
                        	<form role="form" method="post" action="<?= $this->Url->build([
                        	        "controller" => "Users",
                        	        "action" => "login"
                        	    ]); ?>">
                        	    <fieldset>
                        	        <div class="form-group">
                        	            <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                        	        </div>
                        	        <div class="form-group">
                        	            <input class="form-control" placeholder="Password" name="password" type="password">
                        	        </div>
                        	        <button type="submit" class="btn btn-lg btn-success btn-block">Login</a>
                        	    </fieldset>
                        	</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->Html->script('jquery.min') ?>
    <?= $this->Html->script('bootstrap.min') ?>

    <?= $this->fetch('script') ?>

</body>
</html>
