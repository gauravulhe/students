<!-- Navigation -->
<!-- <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">conversion of html template into CakePHP</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <?php $this->Html->link('Users', '/') ?>
                </li>
            </ul>
        </div>
    </div>
</nav> -->
<div id="art-page-background-glare">
    <div id="art-page-background-glare-image"> </div>
</div>
<div id="art-main">
    <div class="art-sheet">
        <div class="art-sheet-tl"></div>
        <div class="art-sheet-tr"></div>
        <div class="art-sheet-bl"></div>
        <div class="art-sheet-br"></div>
        <div class="art-sheet-tc"></div>
        <div class="art-sheet-bc"></div>
        <div class="art-sheet-cl"></div>
        <div class="art-sheet-cr"></div>
        <div class="art-sheet-cc"></div>
        <div class="art-sheet-body">
            <div class="art-header">
                <div class="art-header-clip">
                <div class="art-header-center">
                    <div class="art-header-png"></div>
                    <div class="art-header-jpeg"></div>
                </div>
                </div>
                <div class="art-logo">
                                 <h1 class="art-logo-name"><a href="./index.html"><?= $this->fetch('title') ?></a></h1>
                                                 <h2 class="art-logo-text">Student Management System</h2>
                                </div>
            </div>
            <div class="cleared reset-box"></div>
			<div class="art-nav">
				<div class="art-nav-l"></div>
				<div class="art-nav-r"></div>
			<div class="art-nav-outer">
				<ul class="art-hmenu pull-right">
					<li>
						<?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index']) ?>
					</li>	
					<li>
						<?= $this->Html->link(__('Students'), ['controller' => 'Students', 'action' => 'add']) ?>
					</li>	
					<li>
						<?= $this->Html->link(__('Courses'), ['controller' => 'Courses', 'action' => 'index']) ?>
					</li>	
					<li>
						<?= $this->Html->link(__('Branches'), ['controller' => 'Branches', 'action' => 'index']) ?>
					</li>  
                    <li>
                        <?= $this->Html->link(__('Upload'), ['controller' => 'Files', 'action' => 'index']) ?>
                    </li>
					<li>
						<?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?>
					</li>	
				</ul>
			</div>
			</div>