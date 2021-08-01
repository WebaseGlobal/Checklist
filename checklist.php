<?php $arr = [];?>
<?php if(isset($_POST['list']) && !empty($_POST['list'])):?>
    <?php $txt = null;?>
    <?php for ($i=0; $i<count($_POST['list']); $i++):?>
        <?php $txt .= $_POST['list'][$i]."\n"; ?>
        <?php $arr[$_POST['list'][$i]] = true;?>
    <?php endfor; ?>
    <?php $fp = fopen('checklist.txt','w') or die('Cannot open file');?>
    <?php fwrite($fp,$txt);?>
    <?php fclose($fp);?>
    <?php chmod($fp, 0777);?>
<?php endif; ?>
<?php $points = array('Install new WordPress','Upgrade WordPress','Delete all plugins','Set Site Title in the General Settings','Remove or set new Tagline in the General Settings','Set Email Address to developer@buzy.ie','Set Homepage as a Static Page in Reading Settings','Go to Discussion Settings and uncheck "Allow people to submit comments on new posts"','Change Permalinks to "Post name"','Change Sample Page on Pages to Home and remove alias','Remove Sample Post on Posts','Rename "Uncategorized" Post Category to News/Blog or any other relevant to the project','Remove All Comments','Create Primary Menu','Install and configure below Plugins:','- Yoast SEO','- Smush Pro (do not enable lazy loading)','- Wordfence Security','- WP Rocket (do not activate)','- File Manager','Install Theme (ex. Divi)','Install Child Theme','Remove All Other Themes by File Manager','Add define(\'WP_POST_REVISIONS\',false); to the wp-config','Delete the wp-config-sample.php file','Build Home Page','Build Internal Pages','Enable a sitemap by Yoast','Generate favicon (favicon.io)','Add Recover Code to functions.php','Remove all Lorem Ipsum text','Check if all images are hight quality and have no placeholders','Check all links and buttons','All external hyperlinks open in a new tab','Link logo placed in header and footer to home page','Social Media sharing and links are working','All forms are correct and submit to appropriate locations','All buttons look the same and have hove interaction','Links have interaction when hover','Content is at least 1400px if not indicated differently','Paddings and margins are equal','Fix style for validation form errors','Breadcrumb works well','Search page looks good if exists','Sticky Menu implemented','All internal headers look the same if not differently in design','Make sure that WordPress and all Plugins are up to date','Less than 10 plugins','Enable auto-updates for all plugins','Active WP Rocket','- Enable Minify HTML (if possible)','- Enable Minify CSS (if possible)','- Enable Minify JS (if possible)','- Enable Lazy Loading','- Enable Cache','Test All Pages on Desktop','Test All Pages on Tablet','Test All Pages on Mobile','Make sure that site loads 3 seconds or less and check the score (PageSpeed Insights, GTMetrix, Pingdom)');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Checklist</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>#page-top{padding:60px 0px 80px 0px}.form-check-input,.form-check-label{display:inline}label{padding-left:10px;padding-left: 10px;line-height:42px;font-size:18px;font-weight:400;}.form-check-input{width:20px;height:20px;}.submit-btn{display:none}</style>
    </head>
    <body id="page-top">
        <header>
            <div class="container px-4 text-center">
                <h1 class="fw-bolder">The Checklist</h1>
                <h3 class="lead">Let’s get started.</h3>
            </div>
        </header>
        <section id="list" style="padding-top: 60px">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center center">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <form method="POST" action="checklist.php">
                            <?php if (file_exists('checklist.txt')):?>
                                <?php $file = fopen("checklist.txt","r");?>
                                <?php while(!feof($file)):?>
                                    <?php $data=fgets($file);?>
                                    <?php if(trim($data) != ''):?>
                                        <?php $arr[trim($data)] = true;?>
                                    <?php endif;?>
                                <?php endwhile;?>
                            <?php endif;?>
                            <?php foreach ($points as $key => $val):?>
                                <div class="form-check">
                                  <input <?php if ($arr[$key]):?>checked<?php endif;?> class="form-check-input" type="checkbox" id="flexCheckDefault_<?=$key?>" value="<?=$key?>" name="list[]">
                                  <label class="form-check-label" for="flexCheckDefault_<?=$key?>">
                                    <?=$val?>
                                  </label>
                                </div>
                            <?php endforeach;?>
                            <?php fclose($file);?>
                            <input class="submit-btn" type="submit" value=""/>
                        </form>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('.form-check-input').change(function() {
                    $.post("checklist.php", $('form').serialize(),function(data){});
                });
            });
        </script>
    </body>
</html>