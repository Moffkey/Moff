<?php
if ( ! function_exists('img_src_by_id'))
{
	/**
	 * screen_nameからアイコンを取得
	 *
	 * @param	string	screen_name
	 * @return	string
	 */
	function icon_by_screen_name($screen_name)
	{
        if (!empty($screen_name)) {
            $url = '<img src="//api.surume.tk/misskey/icon/link/'.$screen_name.'/thumbnail" class="icon">';
            return $url;
        }
        return '';
	}
}
