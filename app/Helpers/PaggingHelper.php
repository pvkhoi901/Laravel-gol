<?php
/**
 *-------------------------------------------------------------------------*
 * Helpers pagging
 *
 * process overview  :
 * create date         :   2021/09/05
 *
 * @package                  :   MASTER
 * @copyright                :   Copyright (c) ANS-ASIA
 * @version                  :   1.0.0
 *-------------------------------------------------------------------------*
 * DESCRIPTION
 *
 *
 *
 *
 */
namespace App\Helpers;

class PaggingHelper
{

    /**
     * show pagging for list
     * -----------------------------------------------
     * @param       :   null
     * @return      :   null
     * @access      :   public
     * @see         :   remark
     */
    public static function show($page = array(), $showLabel = 1 ,$php_call = 0)
    {
        $strpage = '';
        if (sizeof($page) != 0) {
            $start = min(($page['page'] - 1) * $page['pagesize'] + 1, $page['totalRecord']);
            $end = min(($page['page'] - 1) * $page['pagesize'] + 40, $page['totalRecord']);
            $label = $showLabel == 1 ? self::_displayCount($start, $end, $page['totalRecord']) : '';
            $strpage = '<label class="panel-title inline-block" style="display: none">' . $label . '</label>';
            $strpage .= self::_showPage($page['page'], $page['pageMax'], $page['totalRecord']);
        } 
        if($php_call == 0){
            echo $strpage;
        }else{
            return $strpage;
        }

    }

    public static function showText($page = array(), $showLabel = 1 ,$php_call = 0,$mode = 0)
    {
        $strpage = '';
        if (sizeof($page) != 0) {
            $start = min(($page['page'] - 1) * $page['pagesize'] + 1, $page['totalRecord']);
            $end = min(($page['page'] - 1) * $page['pagesize'] + 40, $page['totalRecord']);
            if($mode == 0){
                $label = $showLabel == 1 ? self::_displayCount($start, $end, $page['totalRecord'],$mode) : '';
            }else{
                $label = $showLabel == 1 ? self::_displayCount($page['page'], $page['pageMax'], $page['totalRecord'],$mode) : '';
            }
            $strpage = '<label class="panel-title inline-block">' . $label . '</label>';
        } 
        if($php_call == 0){
            echo $strpage;
        }else{
            return $strpage;
        }
    }

    /**
     * show pagging for list
     * -----------------------------------------------
     * @param       :   null
     * @return      :   null
     * @access      :   public
     * @see         :   remark
     */
    private static function _showPage($page, $pageMax, $totalRecord)
    {
        if ($totalRecord == 0) {
            return '';
        }
        //add new
        $disabledfirst = ($page <= 1) ? 'pagging-disable' : '';
        $pagePrevious = 0;
        if ($page > 1) {
            $pagePrevious = $page - 1;
        }
        $page1 = ($page <= 2) ? '' : $page - 2;
        $page2 = ($page <= 1) ? '' : $page - 1;
        $page4 = ($pageMax <= $page) ? '' : $page + 1;
        $page5 = ($pageMax <= $page + 1) ? '' : $page + 2;
        $disabledlast = ($page >= $pageMax) ? 'pagging-disable' : '';

        $paging = '<ul class="pagination pagination-xs pagination-location justify-content-end">';
        $paging .= '    <li class="page-item ' . $disabledfirst . '"><a class="page-link ' . $disabledfirst . '" page="1"><i class="fa fa-angle-double-left"></i></a></li>';  
        $paging .= '    <li class="page-item  ' . $disabledfirst . '"><a class="page-link ' . $disabledfirst . '" page="' . $page2 . '"><i class="fa fa-angle-left"></i></a></li>';  
        if ($page1 != '' && $page1 > 2 && $pageMax > 5) {
            $paging .= '    <li class="page-item step_1"><a class="page-link" page="1">1</a></li>';
            $paging .= '    <li class="page-item pagging-disable  disabled"><a class="page-link" style="padding-top: 9px;  height:34px"><i class="fa fa-ellipsis-h"></i></a></li>';
        }
        if ($page < 5) {
            if ($pageMax < 5) {
                $temp = $pageMax;
            } else {
                $temp = 5;
            }
            for ($i = 1; $i <= $temp; $i++) {
                if ($page != $i) {
                    $paging .= '<li class="page-item step_2"><a class="page-link" page="' . $i . '">' . $i . '</a></li>';
                } else {
                    $paging .= '<li class="page-item active"><a class="page-link" page="' . $i . '">' . $i . '</a></li>';
                }
            }
        } else {
            if ($page + 3 < $pageMax) {
                if ($page1 != '') {
                    $paging .= '    <li class="page-item step_3"><a class="page-link" page="' . $page1 . '">' . $page1 . '</a></li>';
                }
                if ($page2 != '') {
                    $paging .= '    <li class="page-item step_4"><a class="page-link" page="' . $page2 . '">' . $page2 . '</a></li>';
                }

                $paging .= '    <li class="page-item active"><a class="page-link" page="' . $page . '">' . $page . '</a></li>';
                if ($page4 != '') {
                    $paging .= '    <li  class="page-item  step_5"><a class="page-link" page="' . $page4 . '">' . $page4 . '</a></li>';
                }
                if ($page5 != '') {
                    $paging .= '    <li class="page-item  step_6"><a class="page-link" page="' . $page5 . '">' . $page5 . '</a></li>';
                }
            } else {
                for ($i = $pageMax - 4; $i <= $pageMax; $i++) {
                    if ($page != $i) {
                        $paging .= '<li class="page-item step_7"><a class="page-link" page="' . $i . '">' . $i . '</a></li>';
                    } else {
                        $paging .= '<li class="page-item active"><a class="page-link" page="' . $i . '">' . $i . '</a></li>';
                    }
                }
            }
        }

        if (($page5 != '' && $pageMax > $page5 && $pageMax > 5 && (!($pageMax == ($page + 3))) || ($pageMax == 6 && $page < 5)) || ($page == 4 && $pageMax == 7)) {
            $paging .= '    <li class="page-item pagging-disable disabled"><a class="page-link" style="padding-top: 9px; height:34px"><i class="fa fa-ellipsis-h"></i></a></li>';
            $paging .= '    <li class="page-item  step_8"><a class="page-link" page="' . $pageMax . '">' . $pageMax . '</a></li>';
        }
        $paging .= '    <li class="page-item ' . $disabledlast . '"><a class="page-link ' . $disabledlast . '" page="' . $page4 . '"><i class="fa fa-angle-right"></i></a></li>'; 
        $paging .= '    <li class="page-item ' . $disabledlast . '"><a page="' . $pageMax . '" class="page-link ' . $disabledlast . '"><i class="fa fa-angle-double-right"></i></a></li>'; 
        $paging .= '</ul>';
        return $paging;
    }

   
    /**
     * show pagging for list
     * -----------------------------------------------
     * @author      :   BaoNC 2021/09/006- create
     * @param       :   null
     * @return      :   null
     * @access      :   public
     * @see         :   remark
     */
    private static function _displayCount($start, $end, $totalRecord,$mode = 0)
    {
        $displaycount = '';
        if($mode == 0){
            if ($start != 0 && $totalRecord > 0) {
                $displaycount = number_format($totalRecord) . "Showing   " . number_format($start) . " to  " . number_format($end) . " of " . number_format($totalRecord) ." entries ";
            } else {
                $displaycount = number_format($totalRecord) . " Record ";
            }
        }else{
            $displaycount = number_format($end) . "Page from page results" . number_format($start) . " To display";
        }
        return $displaycount;
    }
}
