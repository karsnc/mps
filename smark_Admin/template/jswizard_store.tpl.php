<?php 
include mymps_tpl('inc_head');
?>
<script language="javascript">
function isUndefined(variable) {
	return typeof variable == 'undefined' ? true : false;
}

function insertunit(text) {
	$obj('jstemplate').focus();
	if(!isUndefined($obj('jstemplate').selectionStart)) {
		var opn = $obj('jstemplate').selectionStart + 0;
		$obj('jstemplate').value = $obj('jstemplate').value.substr(0, $obj('jstemplate').selectionStart) + text + $obj('jstemplate').value.substr($obj('jstemplate').selectionEnd);
	} else if(document.selection && document.selection.createRange) {
		var sel = document.selection.createRange();
		sel.text = text.replace(/\r?\n/g, '\r\n');
		sel.moveStart('character', -strlen(text));
	} else {
		$obj('jstemplate').value += text;
	}
}
</script>
<style>
.jswizard{ padding:10px 0; line-height:22px}
</style>
<div id="<?=MPS_SOFTNAME?>" style=" padding-bottom:0">
    <div class="mpstopic-category">
        <div class="panel-tab">
            <ul class="clearfix tab-list">
                <li><a href="?part=settings">基本设置</a></li>
                <li><a href="?" class="current">调用项目管理</a></li>
            </ul>
        </div>
    </div>
</div>
<?php if($id){?>
<div id="<?=MPS_SOFTNAME?>">
<table border="0" cellspacing="0" cellpadding="0" class="vbm">
    <tr class="firstr"><td>预览</td></tr>
	<tbody style="display: yes; background-color:white">
	<tr><td><div class="jswizard"><script language="javascript" src="../javascript.php?flag=<?=$flag?>" <?php if($parameter['jscharset'] == 1) echo 'charset="utf-8"';?>></script></div>
    </td>
    </tr>
    </tbody>
</table>
</div>
<? }?>
<form action="?" method="post">
<input name="customtype" value="store" type="hidden">
<input name="id" value="<?=$id?>" type="hidden">
<div id="<?=MPS_SOFTNAME?>">
<table border="0" cellspacing="0" cellpadding="0" class="vbm">
    <tr class="firstr"><td colspan="3">商家店铺数据调用模板</td></tr>
    <tbody>
    <tr>
    <td><a href="###" title="含链接" onclick="insertunit('{tname}')">{tname}</a>、<a title="不含链接" href="###" onclick="insertunit('{tname_nolink}')">{tname_nolink}</a> 代表商家名称</td>
    <td><a href="###" onclick="insertunit('{prelogo}')">{prelogo}</a> 代表商家缩略图地址（小图）</td>
    <td><a href="###" onclick="insertunit('{hit}')">{hit}</a> 代表店铺点击数</td>
    </tr>
    <tr>
    <td><a href="###" onclick="insertunit('{link}')">{link}</a> 代表商家链接</td>
    <td><a href="###" onclick="insertunit('{introduce}')">{introduce}</a> 代表商家简短介绍</td>
    <td><a href="###" onclick="insertunit('{address}')">{address}</a> 代表商家地址</td>
    </tr>
    <tr>
    <td><a href="###" onclick="insertunit('{tel}')">{tel}</a> 代表商家电话</td>
    <td><a href="###" onclick="insertunit('{qq}')">{qq}</a> 代表商家QQ</td>
    <td><a href="###" onclick="insertunit('{userid}')">{userid}</a> 代表用户名</td>
    </tr>
    <tr>
    <td><a href="###" onclick="insertunit('{jointime}')">{jointime}</a> 代表商家注册时间</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td colspan="3">
    <textarea cols="100" rows="5" id="jstemplate" name="parameter[jstemplate]" style="width: 95%;"><?php echo $parameter['jstemplate'] ? $parameter['jstemplate'] : '<li>{tname}</li>'; ?></textarea>
    </td>
    </tr>
    </tbody>
</table>
</div>
<div id="<?=MPS_SOFTNAME?>">
<table border="0" cellspacing="0" cellpadding="0" class="vbm">
<tr class="firstr"><td colspan="2">主题列表</td></tr>
<tbody id="menu_4d4985d65fe805ed" style="display: yes; background-color:white">
<tr><td width="45%" class="altbg1" ><b>标签名/商家调用唯一标识:</b><br /><span class="smalltxt">请输入一个便于记忆的能代表此商家调用脚本作用的标识，建议用英文及数字表示</span></td><td class="altbg2"><input type="text" class="text" size="50" name="flag" value="<?php echo $flag; ?>" >
</td></tr>
<tr>
<td width="45%" class="altbg1" ><b>所在分类:</b><br /><span class="smalltxt">设置允许参与商家调用的商家分类</span>
</td>
<td class="altbg2">
<select name="parameter[catid]">
<option value="">&nbsp;> 所在分类</option>
<?php echo cat_list('corp','',$parameter[catid],true)?>
</select>
</td>
</tr>
<tr>
<td width="45%" class="altbg1" ><b>所在分站:</b><br /><span class="smalltxt">设置允许参与商家调用的地区</span>
</td>
<td class="altbg2">
<select name="parameter[cityid]">
<option value="">&nbsp;> 全部分站</option>
<?php echo get_cityoptions($parameter[cityid])?>
</select>
</td>
</tr>
<tr>
<td width="45%" class="altbg1" ><b>所在会员组:</b></td>
<td class="altbg2">
<?php echo get_member_level($parameter[levelid],'parameter[levelid]');?>
</td>
</tr>
<tr><td width="45%" class="altbg1" ><b>显示商家条数:</b><br /><span class="smalltxt">设置一次显示的商家条数，请设置为大于 0 的整数</span></td><td class="altbg2"><input type="text" class="text" size="50" name="parameter[items]" value="<?php echo $parameter[items]; ?>" >
</td></tr><tr><td width="45%" class="altbg1" ><b>标题最大字节数:</b><br /><span class="smalltxt">设置当标题长度超过本设定时，是否将标题自动缩减到本设定中的字节数，0 为不自动缩减</span></td><td class="altbg2"><input type="text" class="text" size="50" name="parameter[maxlength]" value="<?php echo $parameter[maxlength]; ?>" >
</td></tr>
<tr><td width="45%" class="altbg1" ><b>只显示指定类型商家:</b><br /><span class="smalltxt">设置特定的主题范围，注意: 全选或全不选均为不进行任何过滤</span></td>
<td class="altbg2">
<?php
 echo get_special_store($parameter['special']);?>
</td>
</tr>
<tr><td width="45%" class="altbg1" ><b>链接打开位置:</b><br /><span class="smalltxt">设置链接开启的位置</span></td><td class="altbg2"><label for="_self"><input class="radio" type="radio" name="parameter[newwindow]" value="0" id="_self" <?php if($parameter[newwindow] == 0) echo 'checked'; ?>> 在当前窗口打开</label><br /><label for="_target"><input class="radio" type="radio" name="parameter[newwindow]" value="1" id="_target" <?php if($parameter[newwindow] == 1) echo 'checked'; ?>> 在新窗口打开</label></td></tr><tr><td width="45%" class="altbg1" ><b>商家排序方式:</b><br /><span class="smalltxt">设置以哪一字段对主题进行排序</span></td><td class="altbg2"><label for="dateline"><input class="radio" type="radio" name="parameter[orderby]" value="dateline" id="dateline" <?php if($parameter[orderby] == 'dateline' || !$parameter) echo 'checked'; ?>> 按注册时间倒序排序</label><br /><label for="views"><input class="radio" type="radio" name="parameter[orderby]" value="views" id="views" <?php if($parameter[orderby] == 'level') echo 'checked'; ?>> 按会员组级别</label></td></tr>
<tr><td width="45%" class="altbg1" ><b>强制字符转换:</b><br /><span class="smalltxt">强制转换数据调用输出的文字为 UTF-8 编码</span></td><td class="altbg2"><label for="jacharset"><input class="radio" type="radio" name="parameter[jscharset]" value="1" <?php if($parameter[jscharset] == 1) echo 'checked'; ?> id="jscharset"> 是</label> &nbsp; &nbsp; 
<label for="no_jscharset"><input class="radio" type="radio" name="parameter[jscharset]" value="0" id="no_jscharset" <?php if($parameter[jscharset] == 0) echo 'checked'; ?>> 否</label>
</td></tr>
</tbody>
</table>
</div>
<center>
<input class="mymps large" type="submit" name="<?=CURSCRIPT?>_submit" value="提 交"><input name="preview" type="hidden" value="1"></center></form><br /></center>
</form>
<?php mymps_admin_tpl_global_foot();?>