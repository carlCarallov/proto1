<?php


defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Output as HTML5
$doc->setHtml5(true);

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

//Add JavaScript Framework

$doc->addScriptVersion($this->baseurl . '/templates/' . $this->template . '/js/bootstrap.js');

// Add Stylesheets
$doc->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/bootstrap.css');
$doc->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/style.css');
$doc->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/style-icon-fonts.css');

// Use of Google Font
if ($this->params->get('googleFont'))
{
	$doc->addStyleSheet('//fonts.googleapis.com/css?family=' . $this->params->get('googleFontName'));
	$doc->addStyleDeclaration("
	h1, h2, h3, h4, h5, h6, .site-title {
		font-family: '" . str_replace('+', ' ', $this->params->get('googleFontName')) . "', sans-serif;
	}");
}

// Template color
if ($this->params->get('templateColor'))
{
	$doc->addStyleDeclaration("
	body.site {
		border-top: 3px solid " . $this->params->get('templateColor') . ";
		background-color: " . $this->params->get('templateBackgroundColor') . ";
	}
	a {
		color: " . $this->params->get('templateColor') . ";
	}
	.nav-list > .active > a,
	.nav-list > .active > a:hover,
	.dropdown-menu li > a:hover,
	.dropdown-menu .active > a,
	.dropdown-menu .active > a:hover,
	.nav-pills > .active > a,
	.nav-pills > .active > a:hover,
	.btn-primary {
		background: " . $this->params->get('templateColor') . ";
	}");
}

// Check for a custom CSS file
$userCss = JPATH_SITE . '/templates/' . $this->template . '/css/user.css';

if (file_exists($userCss) && filesize($userCss) > 0)
{
	$this->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/user.css');
}

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Adjusting content width
if ($this->countModules('left_aside') && $this->countModules('right_aside'))
{
	$span = "col-md-7";
}
elseif ($this->countModules('left_aside') && !$this->countModules('right_aside'))
{
	$span = "col-md-10";
}
elseif (!$this->countModules('left_aside') && $this->countModules('right_aside'))
{
	$span = "col-md-10";
}
else
{
	$span = "col-md-12";
}

// Logo file or site title param
if ($this->params->get('logoFile'))
{
	$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
}
elseif ($this->params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle'), ENT_COMPAT, 'UTF-8') . '</span>';
}
else
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}
?>
    <!DOCTYPE html>
    <html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

    <head>
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <jdoc:include type="head" />

    </head>

    <body>
        
        <div class="container">
            <!--        Первая строка-->
            <div class="row">
                <nav class="navbar navbar-default navbar-top">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                            <a class="navbar-brand" href="#">Экомаг.ру</a>
                        </div>
                        <div class="collapse navbar-collapse" id="navigation">
                            <jdoc:include type="modules" name="navigation" style="none"/>
                            <form class="navbar-form navbar-right" role="search">
                                
                                <jdoc:include type="modules" name="position-1" />
                                    
                                    
                                
                            </form>
                            
                        


                    </div>

            </div>
            </nav>
        </div>
        <!--        Вторая строка-->

        <div class="row top-banner">
            <div class="col-md-4 hidden-xs" >
                <img src="images/logo.png" alt="экомаг">
                <h4 class="logo-text">Только самое лучшее!</h4>
            </div>
            <div class="col-md-4" id="text_0">
                Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на название, не имеет никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки на интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов, абзацев, отступов и т.д. Так как цель применения такого текста исключительно демонстрационная, то и смысловую нагрузку ему нести совсем необязательно. Более того, нечитабельность текста сыграет на руку при оценке качества восприятия макета.
            </div>
            <div class="col-md-4">

                <div class="cart">
                    
                    <jdoc:include type="modules" name="position-2" />


                </div>
                <div class="social col-xs-12">
                    <p>Мы есть в социальных сетях!</p>

                    <ul>
                        <li>
                            <a href="http://google.com" class="icon-google-plus2" target="_blank"></a>
                        </li>
                        <li>
                            <a href="http://vk.com" class="icon-vk" target="_blank"></a>
                        </li>
                        <li>
                            <a href="http://facebook.com" class="icon-facebook2" target="_blank"></a>
                        </li>
                        <li>
                            <a href="http://twitter.com" class="icon-twitter" target="_blank"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--Третья строка-->
        <div class="row hidden-xs ">
            <nav class="navbar navbar-default">
                <ul class="nav navbar-nav" id="central-menu">
                  <li><p>Доставка экологически чистых продуктов!</p></li>
                </ul>
              
            </nav>
        </div>

        <div class="row" id="product">
            <?php if ($this->countModules('left_aside')) : ?>
            <div class="col-md-2 col-xs-12" id="left-aside">
                <nav class="navmenu navmenu-default " role="navigation">
                    <p class="navmenu-brand">Категории</p>
                    <jdoc:include type="modules" name="left_aside" style="none"/>
                   
                </nav>
            </div>
            <?php endif; ?>
            <div class="col-md-7 col-xs-12" >
                <jdoc:include type="message" />
           <div class="col-md-12" id="central-column">
               
   <jdoc:include type="component"/>
               
                </div>        
       	</div>
            <?php if ($this->countModules('right_aside')) : ?>
            <div class="col-md-3 " id="right-aside">
                <div class="inner-container-right-up col-xs-12">
                    <jdoc:include type="modules" name="right_aside" style="none"/>
             </div>
                <div class="inner-container-right-down hidden-xs">
                <jdoc:include type="modules" name="banner" style="none"/>
                </div>
                </div>
            <?php endif; ?>
            </div>
       
        
 </div>
    <div class="container-fluid" id="footer">
    <div class="row">
        <div class="col-md-6 col-xs-6" id="down_menu">

            <jdoc:include type="modules" name="bottom-1" style="none"/>
   
        </div>
        <div class="col-md-6 col-xs-6" id="down_menu_right">
            <jdoc:include type="modules" name="bottom-2" style="none" />
        </div>
        </div>
        
        </div>
      
     
    </body>

    </html>
