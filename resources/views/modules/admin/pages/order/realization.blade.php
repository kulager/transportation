<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:x="urn:schemas-microsoft-com:office:excel"
      xmlns="http://www.w3.org/TR/REC-html40">

<head>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <meta name=ProgId content=Excel.Sheet>
    <meta name=Generator content="Microsoft Excel 15">
    <title>Реализация ТМЗ</title>
{{--    <link rel=File-List href="realization.fld/filelist.xml">--}}
    <style id="realization_28195_Styles">
        <!--
        table {
            mso-displayed-decimal-separator: "\,";
            mso-displayed-thousand-separator: " ";
        }

        @page {
            margin: 0 .7in 0 .7in;
            mso-header-margin: .3in;
            mso-footer-margin: .3in;
            mso-page-orientation: landscape;
        }

        tr {
            mso-height-source: auto;
        }

        col {
            mso-width-source: auto;
        }

        br {
            mso-data-placement: same-cell;
        }

        .style0 {
            mso-number-format: General;
            text-align: general;
            vertical-align: bottom;
            white-space: nowrap;
            mso-rotate: 0;
            mso-background-source: auto;
            mso-pattern: auto;
            color: windowtext;
            font-size: 8.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Arial;
            mso-generic-font-family: auto;
            mso-font-charset: 0;
            border: none;
            mso-protection: locked visible;
            mso-style-name: Обычный;
            mso-style-id: 0;
        }

        td {
            mso-style-parent: style0;
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: windowtext;
            font-size: 8.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Arial;
            mso-generic-font-family: auto;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: general;
            vertical-align: bottom;
            border: none;
            mso-background-source: auto;
            mso-pattern: auto;
            mso-protection: locked visible;
            white-space: nowrap;
            mso-rotate: 0;
        }

        .xl63 {
            mso-style-parent: style0;
            text-align: left;
        }

        .xl64 {
            mso-style-parent: style0;
            text-align: right;
        }

        .xl65 {
            mso-style-parent: style0;
            text-align: left;
            vertical-align: top;
            white-space: normal;
        }

        .xl66 {
            mso-style-parent: style0;
            font-size: 9.0pt;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: left;
        }

        .xl67 {
            mso-style-parent: style0;
            font-size: 9.0pt;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: right;
        }

        .xl68 {
            mso-style-parent: style0;
            text-align: center;
            white-space: normal;
        }

        .xl69 {
            mso-style-parent: style0;
            font-weight: 700;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: center;
        }

        .xl70 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: center;
            vertical-align: middle;
            white-space: normal;
        }

        .xl71 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: left;
            vertical-align: middle;
            white-space: normal;
        }

        .xl72 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: left;
        }

        .xl73 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: left;
            white-space: normal;
        }

        .xl74 {
            mso-style-parent: style0;
            text-align: left;
            border: none;
        }

        .xl75 {
            mso-style-parent: style0;
            text-align: center;
            border: none;
            white-space: normal;
        }

        .xl76 {
            mso-style-parent: style0;
            text-align: left;
            border-top: none;
            border-right: .5pt solid black;
            border-bottom: none;
            border-left: none;
        }

        .xl77 {
            mso-style-parent: style0;
            text-align: center;
            border-top: none;
            border-right: none;
            border-bottom: .5pt solid black;
            border-left: none;
        }

        .xl78 {
            mso-style-parent: style0;
            text-align: center;
            border: none;
        }

        .xl79 {
            mso-style-parent: style0;
            font-weight: 700;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: left;
        }

        .xl80 {
            mso-style-parent: style0;
            text-align: center;
            border: none;
        }

        .xl81 {
            mso-style-parent: style0;
            text-align: left;
            background: white;
            mso-pattern: black none;
        }

        .xl82 {
            mso-style-parent: style0;
            text-align: right;
            background: white;
            mso-pattern: black none;
        }

        .xl83 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: 0;
            text-align: center;
            border-top: .5pt solid black;
            border-right: .5pt solid black;
            border-bottom: .5pt solid black;
            border-left: none;
            white-space: normal;
        }

        .xl84 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: 0;
            text-align: center;
            border-top: .5pt solid black;
            border-right: none;
            border-bottom: .5pt solid black;
            border-left: .5pt solid black;
            white-space: normal;
        }

        .xl85 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: 0;
            text-align: center;
            border-top: .5pt solid black;
            border-right: none;
            border-bottom: .5pt solid black;
            border-left: none;
            white-space: normal;
        }

        .xl86 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: 0;
            text-align: left;
            border-top: .5pt solid black;
            border-right: none;
            border-bottom: .5pt solid black;
            border-left: .5pt solid black;
            background: yellow;
            mso-pattern: black none;
            white-space: normal;
        }

        .xl87 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: 0;
            text-align: left;
            border-top: .5pt solid black;
            border-right: none;
            border-bottom: .5pt solid black;
            border-left: none;
            background: yellow;
            mso-pattern: black none;
            white-space: normal;
        }

        .xl88 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: 0;
            text-align: left;
            border-top: .5pt solid black;
            border-right: .5pt solid black;
            border-bottom: .5pt solid black;
            border-left: none;
            background: yellow;
            mso-pattern: black none;
            white-space: normal;
        }

        .xl89 {
            mso-style-parent: style0;
            mso-number-format: Standard;
            text-align: right;
            border: .5pt solid black;
            background: yellow;
            mso-pattern: black none;
            white-space: normal;
        }

        .xl90 {
            mso-style-parent: style0;
            text-align: right;
            border: .5pt solid black;
            background: white;
            mso-pattern: black none;
            white-space: normal;
        }

        .xl91 {
            mso-style-parent: style0;
            mso-number-format: "\#\,\#\#0";
            text-align: right;
            border: .5pt solid black;
            background: yellow;
            mso-pattern: black none;
        }

        .xl92 {
            mso-style-parent: style0;
            text-align: center;
            border: .5pt solid black;
            background: white;
            mso-pattern: black none;
        }

        .xl93 {
            mso-style-parent: style0;
            font-style: italic;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: center;
            border-top: .5pt solid black;
            border-right: none;
            border-bottom: none;
            border-left: none;
        }

        .xl94 {
            mso-style-parent: style0;
            font-style: italic;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: center;
            border-top: .5pt solid black;
            border-right: none;
            border-bottom: none;
            border-left: none;
        }

        .xl95 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 204;
            text-align: center;
            border-top: none;
            border-right: none;
            border-bottom: .5pt solid black;
            border-left: none;
        }

        .xl96 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 204;
            text-align: left;
            border-top: none;
            border-right: none;
            border-bottom: .5pt solid black;
            border-left: none;
            background: yellow;
            mso-pattern: black none;
        }

        .xl97 {
            mso-style-parent: style0;
            text-align: left;
            border-top: none;
            border-right: none;
            border-bottom: .5pt solid black;
            border-left: none;
            background: yellow;
            mso-pattern: black none;
        }

        .xl98 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 204;
            text-align: left;
            border: none;
        }

        .xl99 {
            mso-style-parent: style0;
            text-align: left;
            border: none;
        }

        .xl100 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 204;
            text-align: left;
            border-top: none;
            border-right: none;
            border-bottom: .5pt solid black;
            border-left: none;
        }

        .xl101 {
            mso-style-parent: style0;
            text-align: left;
            border-top: none;
            border-right: none;
            border-bottom: .5pt solid black;
            border-left: none;
        }

        .xl102 {
            mso-style-parent: style0;
            font-style: italic;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: left;
            border-top: none;
            border-right: none;
            border-bottom: .5pt solid black;
            border-left: none;
            background: yellow;
            mso-pattern: black none;
            white-space: normal;
        }

        .xl103 {
            mso-style-parent: style0;
            text-align: center;
            border: none;
            white-space: normal;
        }

        .xl104 {
            mso-style-parent: style0;
            font-style: italic;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: left;
            border-top: none;
            border-right: none;
            border-bottom: .5pt solid black;
            border-left: none;
            background: yellow;
            mso-pattern: black none;
            white-space: normal;
        }

        .xl105 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 204;
            text-align: center;
            white-space: normal;
        }

        .xl106 {
            mso-style-parent: style0;
            text-align: left;
            border-top: none;
            border-right: none;
            border-bottom: .5pt solid black;
            border-left: none;
            white-space: normal;
        }

        .xl107 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: center;
            vertical-align: middle;
            border-top: .5pt solid black;
            border-right: .5pt solid black;
            border-bottom: none;
            border-left: .5pt solid black;
            white-space: normal;
        }

        .xl108 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: center;
            vertical-align: middle;
            border-top: none;
            border-right: none;
            border-bottom: .5pt solid black;
            border-left: .5pt solid black;
            white-space: normal;
        }

        .xl109 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: center;
            vertical-align: middle;
            border-top: none;
            border-right: none;
            border-bottom: .5pt solid black;
            border-left: none;
            white-space: normal;
        }

        .xl110 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: center;
            vertical-align: middle;
            border-top: none;
            border-right: .5pt solid black;
            border-bottom: .5pt solid black;
            border-left: none;
            white-space: normal;
        }

        .xl111 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: center;
            vertical-align: middle;
            border-top: .5pt solid black;
            border-right: .5pt solid black;
            border-bottom: none;
            border-left: none;
            white-space: normal;
        }

        .xl112 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: 0;
            text-align: right;
            border-top: .5pt solid black;
            border-right: none;
            border-bottom: .5pt solid black;
            border-left: none;
            background: yellow;
            mso-pattern: black none;
            white-space: normal;
        }

        .xl113 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: 0;
            text-align: right;
            border-top: .5pt solid black;
            border-right: .5pt solid black;
            border-bottom: .5pt solid black;
            border-left: none;
            background: yellow;
            mso-pattern: black none;
            white-space: normal;
        }

        .xl114 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: Fixed;
            text-align: right;
            border-top: .5pt solid black;
            border-right: none;
            border-bottom: .5pt solid black;
            border-left: none;
            background: yellow;
            mso-pattern: black none;
            white-space: normal;
        }

        .xl115 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: Fixed;
            text-align: right;
            border-top: .5pt solid black;
            border-right: .5pt solid black;
            border-bottom: .5pt solid black;
            border-left: none;
            background: yellow;
            mso-pattern: black none;
            white-space: normal;
        }

        .xl116 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: 0;
            text-align: center;
            border: .5pt solid black;
            white-space: normal;
        }

        .xl117 {
            mso-style-parent: style0;
            font-style: italic;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: center;
        }

        .xl118 {
            mso-style-parent: style0;
            font-size: 9.0pt;
            font-weight: 700;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: center;
            vertical-align: top;
            border-top: none;
            border-right: none;
            border-bottom: .5pt solid black;
            border-left: none;
            white-space: normal;
        }

        .xl119 {
            mso-style-parent: style0;
            font-size: 9.0pt;
            font-weight: 700;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: 0;
            text-align: center;
            vertical-align: middle;
            border: .5pt solid black;
        }

        .xl120 {
            mso-style-parent: style0;
            font-weight: 700;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: 0;
            text-align: center;
            border: .5pt solid black;
            background: yellow;
            mso-pattern: black none;
            white-space: normal;
        }

        .xl121 {
            mso-style-parent: style0;
            font-weight: 700;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: "Short Date";
            text-align: center;
            border: .5pt solid black;
            background: yellow;
            mso-pattern: black none;
            white-space: normal;
        }

        .xl122 {
            mso-style-parent: style0;
            font-weight: 700;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: center;
            border: .5pt solid black;
            background: yellow;
            mso-pattern: black none;
            white-space: normal;
        }

        .xl123 {
            mso-style-parent: style0;
            text-align: center;
            border: .5pt solid black;
            white-space: normal;
        }

        .xl124 {
            mso-style-parent: style0;
            font-size: 10.0pt;
            font-weight: 700;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: center;
        }

        .xl125 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: center;
            vertical-align: middle;
            border: .5pt solid black;
            white-space: normal;
        }

        .xl126 {
            mso-style-parent: style0;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            text-align: center;
            vertical-align: middle;
            border: .5pt solid black;
            background: yellow;
            mso-pattern: black none;
            white-space: normal;
        }

        -->
    </style>
</head>

<body link=blue vlink=purple>
<!--[if !excel]>&nbsp;&nbsp;<![endif]-->
<!--Следующие сведения были подготовлены мастером публикации веб-страниц
Microsoft Excel.-->
<!--При повторной публикации этого документа из Excel все сведения между тегами
DIV будут заменены.-->
<!----------------------------->
<!--НАЧАЛО ФРАГМЕНТА ПУБЛИКАЦИИ МАСТЕРА ВЕБ-СТРАНИЦ EXCEL -->
<!----------------------------->

<div id="realization_28195" align=center x:publishsource="Excel">

    <table border=0 cellpadding=0 cellspacing=0 width=893 style='border-collapse:
 collapse;table-layout:fixed;width:661pt'>
        <col class=xl63 width=25 style='mso-width-source:userset;mso-width-alt:1216;
 width:19pt'>
        <col class=xl63 width=19 span=9 style='mso-width-source:userset;mso-width-alt:
 896;width:14pt'>
        <col class=xl63 width=9 style='mso-width-source:userset;mso-width-alt:448;
 width:7pt'>
        <col class=xl63 width=19 span=5 style='mso-width-source:userset;mso-width-alt:
 896;width:14pt'>
        <col class=xl63 width=9 span=2 style='mso-width-source:userset;mso-width-alt:
 448;width:7pt'>
        <col class=xl63 width=19 span=10 style='mso-width-source:userset;mso-width-alt:
 896;width:14pt'>
        <col class=xl63 width=25 style='mso-width-source:userset;mso-width-alt:1216;
 width:19pt'>
        <col class=xl63 width=19 span=5 style='mso-width-source:userset;mso-width-alt:
 896;width:14pt'>
        <col class=xl63 width=9 style='mso-width-source:userset;mso-width-alt:448;
 width:7pt'>
        <col class=xl63 width=19 span=2 style='mso-width-source:userset;mso-width-alt:
 896;width:14pt'>
        <col class=xl63 width=9 style='mso-width-source:userset;mso-width-alt:448;
 width:7pt'>
        <col class=xl63 width=19 span=11 style='mso-width-source:userset;mso-width-alt:
 896;width:14pt'>
        <tr height=15 style='mso-height-source:userset;height:11.0pt'>
            <td height=15 class=xl63 width=25 style='height:11.0pt;width:19pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=9 style='width:7pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=9 style='width:7pt'></td>
            <td class=xl63 width=9 style='width:7pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=25 style='width:19pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=9 style='width:7pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td class=xl63 width=9 style='width:7pt'></td>
            <td class=xl63 width=19 style='width:14pt'></td>
            <td colspan=10 class=xl117 width=190 style='width:140pt'>Приложение 26</td>
        </tr>
        <tr height=15 style='mso-height-source:userset;height:11.0pt'>
            <td height=15 class=xl63 style='height:11.0pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td colspan=10 class=xl117>к приказу Министра финансов</td>
        </tr>
        <tr height=15 style='mso-height-source:userset;height:11.0pt'>
            <td height=15 class=xl63 style='height:11.0pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td colspan=10 class=xl117>Республики Казахстан</td>
        </tr>
        <tr height=15 style='mso-height-source:userset;height:11.0pt'>
            <td height=15 class=xl63 style='height:11.0pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td colspan=10 class=xl117>от 20 декабря 2012 года № 562</td>
        </tr>
        <tr class=xl63 height=15 style='mso-height-source:userset;height:11.0pt'>
            <td height=15 class=xl63 style='height:11.0pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
        </tr>
        <tr height=16 style='mso-height-source:userset;height:12.0pt'>
            <td height=16 class=xl63 style='height:12.0pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl64>Форма З-2</td>
        </tr>
        <tr class=xl63 height=15 style='mso-height-source:userset;height:11.0pt'>
            <td height=15 class=xl65 width=25 style='height:11.0pt;width:19pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=9 style='width:7pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=9 style='width:7pt'></td>
            <td class=xl65 width=9 style='width:7pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=25 style='width:19pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl65 width=9 style='width:7pt'></td>
            <td class=xl65 width=19 style='width:14pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
        </tr>
        <tr height=15 style='mso-height-source:userset;height:11.0pt'>
            <td height=15 class=xl63 style='height:11.0pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
        </tr>
        <tr height=32 style='mso-height-source:userset;height:24.0pt'>
            <td colspan=13 height=32 class=xl73 width=243 style='height:24.0pt;
  width:180pt'>Организация (индивидуальный предприниматель)
            </td>
            <td colspan=23 class=xl118 width=413 style='width:306pt'>ТОВАРИЩЕСТВО С
                ОГРАНИЧЕННОЙ ОТВЕТСТВЕННОСТЬЮ (ТОО) &quot;KULAGER SERVICE&quot;
            </td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl66 colspan=4 style='mso-ignore:colspan'>ИИН/БИН</td>
            <td colspan=7 class=xl119>200840000773</td>
        </tr>
        <tr height=16 style='mso-height-source:userset;height:12.0pt'>
            <td height=16 class=xl63 style='height:12.0pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
        </tr>
        <tr class=xl63 height=15 style='mso-height-source:userset;height:11.0pt'>
            <td height=15 class=xl63 style='height:11.0pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
        </tr>
        <tr height=29 style='mso-height-source:userset;height:22.0pt'>
            <td height=29 class=xl63 style='height:22.0pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl68 width=19 style='width:14pt'></td>
            <td colspan=4 class=xl123 width=76 style='width:56pt'>Номер документа</td>
            <td colspan=4 class=xl123 width=76 style='border-left:none;width:56pt'>Дата
                составления
            </td>
        </tr>
        <tr height=15 style='mso-height-source:userset;height:11.0pt'>
            <td height=15 class=xl63 style='height:11.0pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl69></td>
            <td colspan=4 class=xl120 width=76 style='width:56pt'>{{$order->document_id}}</td>
            <td colspan=4 class=xl121 width=76 style='border-left:none;width:56pt'>{{$date_format}}</td>
        </tr>
        <tr height=15 style='mso-height-source:userset;height:11.0pt'>
            <td height=15 class=xl63 style='height:11.0pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
        </tr>
        <tr height=17 style='mso-height-source:userset;height:13.0pt'>
            <td colspan=49 height=17 class=xl124 style='height:13.0pt'>НАКЛАДНАЯ НА
                ОТПУСК ЗАПАСОВ НА СТОРОНУ
            </td>
        </tr>
        <tr height=15 style='height:11.5pt'>
            <td height=15 class=xl63 style='height:11.5pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
        </tr>
        <tr height=15 style='height:11.5pt'>
            <td height=15 class=xl63 style='height:11.5pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
        </tr>
        <tr class=xl70 height=29 style='mso-height-source:userset;height:22.0pt'>
            <td colspan=11 height=29 class=xl125 width=205 style='height:22.0pt;
  width:152pt'>Организация (индивидуальный предприниматель) - отправитель
            </td>
            <td colspan=11 class=xl125 width=189 style='border-left:none;width:140pt'>Организация
                (индивидуальный предприниматель) - получатель
            </td>
            <td colspan=9 class=xl125 width=177 style='border-left:none;width:131pt'>Ответственный
                за поставку (Ф.И.О.)
            </td>
            <td colspan=9 class=xl125 width=151 style='border-left:none;width:112pt'>Транспортная
                организация
            </td>
            <td colspan=9 class=xl125 width=171 style='border-left:none;width:126pt'>Товарно-транспортная
                накладная (номер, дата)
            </td>
        </tr>
        <tr class=xl71 height=44 style='mso-height-source:userset;height:33.0pt'>
            <td colspan=11 height=44 class=xl125 width=205 style='height:33.0pt;
  width:152pt'>ТОВАРИЩЕСТВО С ОГРАНИЧЕННОЙ ОТВЕТСТВЕННОСТЬЮ (ТОО) &quot;KULAGER SERVICE&quot;
            </td>
            <td colspan=11 class=xl126 width=189 style='border-left:none;width:140pt'>{{$order->company->name}}
                ИНН {{$order->company->bin_inn}}</td>
            <td colspan=9 class=xl125 width=177 style='border-left:none;width:131pt'>Бухгалтер</td>
            <td colspan=9 class=xl126 width=151 style='border-left:none;width:112pt'>ЧЛ
                Изотова Б. А.
            </td>
            <td colspan=9 class=xl126 width=171 style='border-left:none;width:126pt'>№0{{$order->document_id}}
                от {{$date_format}} г.
            </td>
        </tr>
        <tr class=xl72 height=15 style='mso-height-source:userset;height:11.0pt'>
            <td height=15 class=xl72 style='height:11.0pt'></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
            <td class=xl72></td>
        </tr>
        <tr class=xl73 height=23 style='mso-height-source:userset;height:17.0pt'>
            <td colspan=2 rowspan=2 height=44 class=xl107 width=44 style='border-bottom:
  .5pt solid black;height:33.0pt;width:33pt'>Номер по порядку
            </td>
            <td colspan=12 rowspan=2 class=xl107 width=218 style='border-bottom:.5pt solid black;
  width:161pt'>Наименование, характеристика
            </td>
            <td colspan=5 rowspan=2 class=xl107 width=75 style='border-bottom:.5pt solid black;
  width:56pt'>Номенкла-<br>
                турный номер
            </td>
            <td colspan=3 rowspan=2 class=xl111 width=57 style='border-bottom:.5pt solid black;
  width:42pt'>Единица измерения
            </td>
            <td colspan=9 class=xl125 width=177 style='border-left:none;width:131pt'>Количество</td>
            <td colspan=6 rowspan=2 class=xl107 width=104 style='border-bottom:.5pt solid black;
  width:77pt'>Цена за единицу, в KZT
            </td>
            <td colspan=6 rowspan=2 class=xl107 width=104 style='border-bottom:.5pt solid black;
  width:77pt'>Сумма без НДС, в KZT
            </td>
            <td colspan=6 rowspan=2 class=xl107 width=114 style='border-bottom:.5pt solid black;
  width:84pt'>Сумма НДС, в KZT
            </td>
        </tr>
        <tr class=xl73 height=21 style='mso-height-source:userset;height:16.0pt'>
            <td colspan=5 height=21 class=xl125 width=95 style='height:16.0pt;border-left:
  none;width:70pt'>подлежит отпуску
            </td>
            <td colspan=4 class=xl125 width=82 style='border-left:none;width:61pt'>отпущено</td>
        </tr>
{{--        <tr class=xl72 height=15 style='mso-height-source:userset;height:11.0pt'>--}}
{{--            <td colspan=2 height=15 class=xl116 width=44 style='height:11.0pt;width:33pt'>1</td>--}}
{{--            <td colspan=12 class=xl116 width=218 style='border-left:none;width:161pt'>2</td>--}}
{{--            <td colspan=5 class=xl116 width=75 style='border-left:none;width:56pt'>3</td>--}}
{{--            <td colspan=3 class=xl83 width=57 style='width:42pt'>4</td>--}}
{{--            <td colspan=5 class=xl116 width=95 style='border-left:none;width:70pt'>5</td>--}}
{{--            <td colspan=4 class=xl116 width=82 style='border-left:none;width:61pt'>6</td>--}}
{{--            <td colspan=6 class=xl116 width=104 style='border-left:none;width:77pt'>7</td>--}}
{{--            <td colspan=6 class=xl116 width=104 style='border-left:none;width:77pt'>8</td>--}}
{{--            <td colspan=6 class=xl116 width=114 style='border-left:none;width:84pt'>9</td>--}}
{{--        </tr>--}}
        @foreach($order->products as $product)
            <tr class=xl72 height=15 style='mso-height-source:userset;height:11.0pt'>
                <td colspan=2 height=15 class=xl84 width=44 style='border-right:.5pt solid black;
  height:11.0pt;width:33pt'>{{$i}}
                </td>
                <td colspan=12 class=xl86 width=218 style='border-right:.5pt solid black;
  border-left:none;width:161pt'>{{$product->product->name}}
                </td>
                <td class=xl84 width=19 style='border-top:none;border-left:none;width:14pt'>&nbsp;</td>
                <td class=xl85 width=19 style='border-top:none;width:14pt'>&nbsp</td>
                <td class=xl85 width=9 style='border-top:none;width:7pt'>&nbsp;</td>
                <td class=xl85 width=9 style='border-top:none;width:7pt'>&nbsp;</td>
                <td class=xl83 width=19 style='border-top:none;width:14pt'>&nbsp;</td>
                <td class=xl85 width=19 style='border-top:none;width:14pt'>&nbsp;</td>
                <td class=xl85 width=19 style='border-top:none;width:14pt'>кг</td>
                <td class=xl83 width=19 style='border-top:none;width:14pt'>&nbsp;</td>
                <td class=xl84 width=19 style='border-top:none;border-left:none;width:14pt'>&nbsp;</td>
                <td class=xl85 width=19 style='border-top:none;width:14pt'>&nbsp;</td>
                <td colspan=3 class=xl112 width=57 style='border-right:.5pt solid black;
  width:42pt'>{{$product->net_weight}}
                </td>
                <td class=xl84 width=19 style='border-top:none;border-left:none;width:14pt'>&nbsp;</td>
                <td class=xl85 width=25 style='border-top:none;width:19pt'>&nbsp;</td>
                <td colspan=2 class=xl112 width=38 style='border-right:.5pt solid black;
  width:28pt'>{{$product->net_weight}}
                </td>
                <td class=xl84 width=19 style='border-top:none;border-left:none;width:14pt'>&nbsp;</td>
                <td class=xl85 width=19 style='border-top:none;width:14pt'>&nbsp;</td>
                <td class=xl85 width=19 style='border-top:none;width:14pt'>&nbsp;</td>
                <td class=xl85 width=9 style='border-top:none;width:7pt'>&nbsp;</td>
                <td colspan=2 class=xl114 width=38 style='border-right:.5pt solid black;
  width:28pt'>{{$product->product->price}}
                </td>
                <td class=xl84 width=9 style='border-top:none;border-left:none;width:7pt'>&nbsp;</td>
                <td class=xl85 width=19 style='border-top:none;width:14pt'>&nbsp;</td>
                <td colspan=4 class=xl114 width=76 style='border-right:.5pt solid black;
  width:56pt'>{{$product->product->price * $product->net_weight}}
                </td>
                <td class=xl84 width=19 style='border-top:none;border-left:none;width:14pt'>&nbsp;</td>
                <td class=xl85 width=19 style='border-top:none;width:14pt'>&nbsp;</td>
                <td class=xl85 width=19 style='border-top:none;width:14pt'>&nbsp;</td>
                <td class=xl85 width=19 style='border-top:none;width:14pt'>&nbsp;</td>
                <td class=xl85 width=19 style='border-top:none;width:14pt'>&nbsp;</td>
                <td class=xl83 width=19 style='border-top:none;width:14pt'>&nbsp;</td>
            </tr>
            <?php $i++ ?>
        @endforeach
        <tr height=15 style='mso-height-source:userset;height:11.0pt'>
            <td height=15 class=xl63 style='height:11.0pt'></td>
            <td class=xl63></td>
            <td class=xl81>&nbsp;</td>
            <td class=xl81>&nbsp;</td>
            <td class=xl81>&nbsp;</td>
            <td class=xl81>&nbsp;</td>
            <td class=xl81>&nbsp;</td>
            <td class=xl81>&nbsp;</td>
            <td class=xl81>&nbsp;</td>
            <td class=xl81>&nbsp;</td>
            <td class=xl81>&nbsp;</td>
            <td class=xl81>&nbsp;</td>
            <td class=xl81>&nbsp;</td>
            <td class=xl81>&nbsp;</td>
            <td class=xl81>&nbsp;</td>
            <td class=xl81>&nbsp;</td>
            <td class=xl81>&nbsp;</td>
            <td class=xl81>&nbsp;</td>
            <td class=xl81>&nbsp;</td>
            <td class=xl81>&nbsp;</td>
            <td class=xl82>Итого</td>
            <td class=xl63></td>
            <td colspan=5 class=xl91>{{$total_net}}</td>
            <td colspan=4 class=xl91 style='border-left:none'>{{$total_net}}</td>
            <td colspan=6 class=xl92 style='border-left:none'>х</td>
            <td colspan=6 class=xl89 width=104 style='border-left:none;width:77pt'>{{$total}}
            </td>
            <td colspan=6 class=xl90 width=114 style='border-left:none;width:84pt'>&nbsp;</td>
        </tr>
        <tr height=15 style='mso-height-source:userset;height:11.25pt'>
            <td height=15 class=xl63 style='height:11.25pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
        </tr>
        <tr height=35 style='mso-height-source:userset;height:26.25pt'>
            <td height=35 class=xl74 colspan=13 style='height:26.25pt;mso-ignore:colspan'>Всего
                отпущено количество запасов (прописью)
            </td>
            <td colspan=9 class=xl102 width=151 style='width:112pt'>{{$total_net_format}}
                килограмм<span style='mso-spacerun:yes'> </span></td>
            <td colspan=8 class=xl103 width=158 style='width:117pt'>на сумму (прописью),
                в KZT
            </td>
            <td colspan=19 class=xl104 width=341 style='width:252pt'>{{$total_format}} тенге 00 тиын
            </td>
        </tr>
        <tr height=16 style='mso-height-source:userset;height:12.0pt'>
            <td height=16 class=xl63 style='height:12.0pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
        </tr>
        <tr height=16 style='mso-height-source:userset;height:12.0pt'>
            <td height=16 class=xl63 colspan=5 style='height:12.0pt;mso-ignore:colspan'>Отпуск
                разрешил
            </td>
            <td colspan=5 class=xl100><span style='mso-spacerun:yes'>        
  </span>директор
            </td>
            <td class=xl75 width=9 style='width:7pt'>/</td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl75 width=9 style='width:7pt'>/</td>
            <td colspan=7 class=xl105 width=123 style='width:91pt'>Тохатова Ж.Н.</td>
            <td class=xl76>&nbsp;</td>
            <td class=xl63></td>
            <td class=xl63 colspan=5 style='mso-ignore:colspan'>По доверенности</td>
            <td colspan=17 class=xl106 width=303 style='width:224pt'>без доверенности</td>
            <td class=xl63></td>
        </tr>
        <tr height=16 style='mso-height-source:userset;height:12.0pt'>
            <td height=16 class=xl63 style='height:12.0pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td colspan=5 class=xl94>должность</td>
            <td class=xl63></td>
            <td colspan=5 class=xl94>подпись</td>
            <td class=xl63></td>
            <td colspan=7 class=xl94>расшифровка подписи</td>
            <td class=xl76>&nbsp;</td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
        </tr>
        <tr class=xl63 height=20 style='mso-height-source:userset;height:15.0pt'>
            <td height=20 class=xl63 style='height:15.0pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl76>&nbsp;</td>
            <td class=xl63></td>
            <td class=xl63 colspan=3 style='mso-ignore:colspan'>выданной</td>
            <td colspan=19 class=xl106 width=341 style='width:252pt'>&nbsp;</td>
            <td class=xl63></td>
        </tr>
        <tr class=xl63 height=39 style='mso-height-source:userset;height:29.25pt'>
            <td height=39 class=xl63 style='height:29.25pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl76>&nbsp;</td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
        </tr>
        <tr height=32 style='mso-height-source:userset;height:24.0pt'>
            <td height=32 class=xl63 colspan=5 style='height:24.0pt;mso-ignore:colspan'>Главный
                бухгалтер
            </td>
            <td colspan=5 class=xl77>&nbsp;</td>
            <td class=xl78>/</td>
            <td colspan=11 class=xl103 width=189 style='width:140pt'>Не предусмотрен</td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl76>&nbsp;</td>
            <td class=xl63></td>
            <td colspan=22 class=xl100>&nbsp;</td>
            <td class=xl63></td>
        </tr>
        <tr height=15 style='mso-height-source:userset;height:11.0pt'>
            <td height=15 class=xl63 style='height:11.0pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td colspan=5 class=xl94>подпись</td>
            <td class=xl63></td>
            <td colspan=11 class=xl93>расшифровка подписи</td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl76>&nbsp;</td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
        </tr>
        <tr class=xl63 height=11 style='mso-height-source:userset;height:8.0pt'>
            <td height=11 class=xl79 colspan=2 style='height:8.0pt;mso-ignore:colspan'>М.П.</td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl76>&nbsp;</td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
        </tr>
        <tr height=15 style='mso-height-source:userset;height:11.0pt'>
            <td height=15 class=xl63 style='height:11.0pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl76>&nbsp;</td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
        </tr>
        <tr height=15 style='mso-height-source:userset;height:11.0pt'>
            <td height=15 class=xl63 colspan=3 style='height:11.0pt;mso-ignore:colspan'>Отпустил</td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td colspan=5 class=xl95>директор</td>
            <td class=xl78>/</td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td colspan=6 class=xl98>Тохатова Ж.Н.</td>
            <td class=xl76>&nbsp;</td>
            <td class=xl63></td>
            <td class=xl63 colspan=5 style='mso-ignore:colspan'>Запасы получил</td>
            <td class=xl77>&nbsp;</td>
            <td class=xl77>&nbsp;</td>
            <td class=xl77>&nbsp;</td>
            <td class=xl77>&nbsp;</td>
            <td class=xl77>&nbsp;</td>
            <td class=xl63></td>
            <td class=xl80>/</td>
            <td colspan=10 class=xl96>{{$order->driver_full_name}}</td>
            <td class=xl63></td>
        </tr>
        <tr height=15 style='mso-height-source:userset;height:11.5pt'>
            <td height=15 class=xl63 style='height:11.5pt'></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td colspan=5 class=xl94>подпись</td>
            <td class=xl63></td>
            <td colspan=11 class=xl93>расшифровка подписи</td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl76>&nbsp;</td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td class=xl63></td>
            <td colspan=6 class=xl93>подпись</td>
            <td class=xl63></td>
            <td colspan=10 class=xl93>расшифровка подписи</td>
            <td class=xl63></td>
        </tr>
    </table>

</div>

<script src="{{asset('modules/admin/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script>
    $(document).ready(() => {
        window.print();
    });
</script>
<!----------------------------->
<!--КОНЕЦ ФРАГМЕНТА ПУБЛИКАЦИИ МАСТЕРА ВЕБ-СТРАНИЦ EXCEL-->
<!----------------------------->
</body>

</html>
