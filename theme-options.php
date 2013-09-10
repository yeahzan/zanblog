<?php


add_action('admin_menu', 'option_page');
 
function option_page()
{
    if (count($_POST) > 0 && isset($_POST['zanblog_settings'])) {
        $options = array('zanblog_keywords', 'zanblog_description', 'zanblog_analytics');
        foreach ($options as $opt) {
            delete_option($opt, $_POST[$opt]);
            add_option($opt, $_POST[$opt]);
        }
    }
    add_theme_page(__('主题选项'), __('Zanblog主题选项'), 'edit_themes', basename(__FILE__), 'zanblog_settings');
}
 
function zanblog_settings()
{


    ?>
 
<style>
    .wrap, textarea, em {
        font-family: 'Century Gothic', 'Microsoft YaHei', Verdana;
    }
 
    fieldset {
        width: 50%;
        border: 1px solid #aaa;
        padding-bottom: 20px;
        margin-top: 20px;
        -webkit-box-shadow: rgba(0, 0, 0, .2) 0px 0px 5px;
        -moz-box-shadow: rgba(0, 0, 0, .2) 0px 0px 5px;
        box-shadow: rgba(0, 0, 0, .2) 0px 0px 5px;
       
    }

    fieldset  table  tr{
         border-bottom: 1px  dashed  #dcde22;

    }
 
    legend {
        margin-left: 5px;
        padding: 0 5px;
        color: #2481C6;
        background: #F9F9F9;
        cursor: pointer;
    }
 
    textarea {
        width: 100%;
        font-size: 11px;
        border: 1px solid #aaa;
        background: none;
        -webkit-box-shadow: rgba(0, 0, 0, .2) 1px 1px 2px inset;
        -moz-box-shadow: rgba(0, 0, 0, .2) 1px 1px 2px inset;
        box-shadow: rgba(0, 0, 0, .2) 1px 1px 2px inset;
        -webkit-transition: all .4s ease-out;
        -moz-transition: all .4s ease-out;
    }
 
    textarea:focus {
        -webkit-box-shadow: rgba(0, 0, 0, .2) 0px 0px 8px;
        -moz-box-shadow: rgba(0, 0, 0, .2) 0px 0px 8px;
        box-shadow: rgba(0, 0, 0, .2) 0px 0px 8px;
        outline: none;
    }

    fieldset span{
        color: #F0AD4E;
    }
 
</style>
 
<div class="wrap">
    <h2>主题选项</h2> 
    <form method="post" action="">
        <fieldset>
            <legend><strong>SEO</strong></legend>
            <table class="form-table">
                <tr>
                    <td>

                        <textarea name="zanblog_keywords" id="zanblog_keywords" rows="1"
                                  cols="70"><?php echo get_option('zanblog_keywords'); ?></textarea><br/>
                                  <span>首页keywords标签</span>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        
                        <textarea name="zanblog_description" id="zanblog_description" rows="3"
                                  cols="70"><?php echo get_option('zanblog_description'); ?></textarea>
                                  <span>首页description标签</span>
                        
                    </td>
                </tr>
            </table>
        </fieldset>
 
        <fieldset>
            <legend><strong>统计代码</strong></legend>
            <table class="form-table">
                <tr>
                    <td>
                        
                        <textarea name="zanblog_analytics" id="zanblog_analytics" rows="5"
                                  cols="70"><?php echo stripslashes(get_option('zanblog_analytics')); ?></textarea>
                                  <span>记录网站数据</span>

                    </td>
                </tr>
            </table>
        </fieldset>

        
        <p class="submit" >
            <input type="submit" name="Submit" class="button-primary" value="保存设置"/>
            <input type="hidden" name="zanblog_settings" value="save" style="display:none;"/>
        </p>

    </form>
    
    <p>Theme by <a href="http://www.yeahzan.com">佚站互联</a></p>
   
</div>
 
<?php
}