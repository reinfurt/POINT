<?
date_default_timezone_set("America/New_York");
require_once('lib/systemDatabase.php');
require_once("lib/systemCookie.php");
require_once("lib/displayNavigation.php");

// parse $id
$id = $_GET['id'];
if(!$id)
	$id = 0;
else {
	$ids = explode(",", $id);
	$idFull = $id;
	$id = end($ids);
}

// dev
$dev = $_REQUEST['dev'];
$dev = systemCookie("devCookie", $dev, 0);
if(!$dev) 
	die('In progress . . .');

// document header
$doc_title = 'Point';
$pageName = basename($_SERVER['PHP_SELF'], ".php");

$u = "http://".$_SERVER['SERVER_NAME'];

$sql = "SELECT * from objects where id = $id";
$res = MYSQL_QUERY($sql);
$obj = MYSQL_FETCH_ARRAY($res);
$name = $obj['name1'] ? $obj['name1'] : "Point";

// detect mobile
// $isMobile = (bool)preg_match('#\b(ip(hone|od|ad)|android|opera m(ob|in)i|windows (phone|ce)|blackberry|tablet'.
// 				'|s(ymbian|eries60|amsung)|p(laybook|alm|rofile/midp|laystation portable)|nokia|fennec|htc[\-_]'.
// 				'|mobile|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', $_SERVER['HTTP_USER_AGENT']);

?>

<!DOCTYPE html>
<html>
	<head>
		<title><? echo $doc_title; ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="GLOBAL/global.css">
		<script type="text/javascript" src="JS/pointDuration.js"></script>
	</head>
	<body>
		<!--  preload futura-book so that canvas has it immediately when it calls for it -->
		<!--  this could be replaced by instead using onload or another event to startPointDuration -->
		<div style="font-family: futura-book;"></div>

		<div id="page">
			<header id="menu" class="now">
				<div id="menu-base">
				<?php
					// echo $name;
						echo "
This website is a filing cabinet for the ANNUAL REPORTS of
<br/>POINT Centre for Contemporary Art, Nicosia, Cyprus since 2012.
<br/>
Select a year to review . . . 

<br/>
<br/>Meanwhile, <a href=''>here</a> is what's happening now.
";

					if($id)
						echo "Point"; 
				?>

				</div>
				<div id="menu-hover">
					<!-- <a href="<? echo $u; ?>">Point<br>Centre for Contemporary Art, Nicosia, Cyprus<br/>Annual Reports, 2012–2015</a> -->


					<a href="<? echo $u; ?>">Point
<br/>This website is a filing cabinet of the ANNUAL REPORTS of
<br/>POINT Centre for Contemporary Art, Nicosia, Cyprus
<br/>2012–2015

</a>

					<br/>
					<br/>
					<div style="display: inline-block;"><? 
						displayNavigation(); 
					?></div>
				</div>
			</header>

<?php
if ($id) {
?>

			<div id="body">

<p>
An annual report is a <a href="">comprehensive report</a> on a company's activities throughout the preceding year. Annual reports are <a href="">intended</a> to give shareholders and other interested people information about the company's activities and financial performance. They may be considered as grey literature. Most jurisdictions require companies to prepare and disclose annual reports, and many require the annual report to be filed at the company's registry. Companies listed on a stock exchange are also required to report at more frequent intervals (depending upon the rules of the stock exchange involved).
</p>
<p>
Grey literature (or gray literature) is a type of information or research output produced by organisations, outside of commercial or academic publishing and <a href="">distribution channels</a>. Grey literature may be in print or digital form and common grey literature publication types include reports (annual, research, technical, project etc.), working papers, government documents, and evaluations. Organisations that produce grey literature include government departments and agencies, civil society or non-governmental organisations, academic centres and departments, and private companies and consultants.
</p>
<p>
<a href="">Grey literature</a> exists on a publishing <a href="">spectrum</a>, with <a href="">commercial and scholarly publishing outputs</a> such as books, journal articles, magazines and newspapers at one end (sometimes referred to as black literature), and unpublished materials such as personal notes and ephemera at the other (sometimes referred to as white literature).
</p>
<p>
Grey literature may be made available to the public, or distributed privately within an organisation or group, and <a href="">often lacks systematic means of distribution and collection</a>. The standard of quality, <a href="">review and production can also vary considerably</a>. Grey literature is therefore often difficult to discover, access and evaluate.
</p>
<p>
The <a href="">concept</a> of grey literature has gradually emerged since the <a href="">1970s</a>. When Charles P. Auger published the <a href="">first edition of his landmark work on "reports literature"</a> in 1975, he did not use the term "grey literature".[1] Nevertheless, his account of this "vast body of documents", with its "continuing increasing quantity", the "difficulty it presents to the librarian", its ambiguity between temporary character and durability, and its growing impact on scientific research, was entirely compatible with what is now called grey literature. While acknowledging the challenges of reports literature, he also recognized that it held a "number of advantages over other means of dissemination, including greater speed, greater flexibility and the opportunity to go into considerable detail if necessary". For Auger, reports were a "half-published" communication medium with a "complex interrelationship [to] scientific journals". Only in the second edition of his book, published in 1989, did he adopt the term "grey literature".[2]
</p>
<p>
The so-called <a href="">"Luxembourg definition"</a>, discussed and approved at the <a href="">Third International Conference on Grey Literature</a> in 1997, defined grey literature as 
</p>
<p style="margin-left: 200px; font-style: italic;">
"that which is produced on all levels of government, academics, business and industry in print and electronic formats, but which is not controlled by commercial publishers". In 2004, at the Sixth Conference in New York, a postscript was added for purposes of clarification: grey literature is "...not controlled by commercial publishers, i.e., where publishing is not the primary activity of the producing body".[3] This definition has since been used extensively and is widely accepted.
</p>
<p>
The U.S. Interagency Gray Literature Working Group (IGLWG), in its <a href="">"Gray Information Functional Plan"</a> of 1995, defined grey literature as 
</p>
<p style="margin-left: 200px; font-style: italic;">
"foreign or domestic open source material that usually is available through specialized channels and may not enter normal channels or systems of publication, distribution, bibliographic control, or acquisition by booksellers or subscription agents".
</p>
<p>
Other terms used for this material, both <a href="">in the past</a> and <a href="">still today</a>, include report literature, government publications, policy documents, <a href="">fugitive literature</a>, nonconventional literature, <a href="">unpublished literature</a>, non-traditional publications and many others. With the introduction of desktop publishing and the internet, new terms added to the list include electronic publications, online publications, online resources, open access research, digital documents, etc.
</p>
<p>
While the term grey literature is fairly obscure and difficult to define, it has the advantage of being an agreed collective term that researchers and information professionals and researchers can use to group and discuss <a href="">this distinct group of resources</a>.
</p>
<p>
In 2010 D.J. Farace and J. Schöpfel pointed out that existing definitions of grey literature were predominantly economic, and argued that in a changing research environment, and with new channels of scientific communication, grey literature needed a new <a href="">conceptual framework</a>.[4] They proposed a new definition ("Prague Definition"): "Grey literature stands for manifold document types produced on all levels of government, academics, business and industry in print and electronic formats that are protected by intellectual property rights, of sufficient quality to be collected and preserved by library holdings or institutional repositories, but not controlled by commercial publishers i.e., where publishing is not the primary activity of the producing body."
</p>
<p>
Today, due to the overwhelming success of web publishing and access to documents focus has shifted to quality, intellectual property, and curation. Without the revision mentioned above, the current definition risks becoming <a href="">obsolete due to its inability to differentiate grey literature</a> from other documents.
</p>
<p>
The term grey literature refers to <a href="">a large number of resource types</a> including institutional reports, annual or activity reports, <a href="">project or study reports</a>, technical reports, government reports, <a href="">research reports</a> etc. In the other categories, citation analyses[5] offer a wide range of grey resources. Besides theses and conference proceedings, they also include unpublished manuscripts, newsletters, recommendations and technical standards, patents, <a href="">technical notes</a>, product catalogs, data and statistics, presentations, malin-grey literature, working papers, field notes, laboratory research books, preprints, academic courseware, lecture notes, and so on. The international network GreyNet maintains an online listing of document types.[6]
</p>
<p>
Organisations produce grey literature as a means of encapsulating, storing and sharing information, for their own use and for wider distribution. This can take the form of a record of data and information on a site or project (archaeological records, survey data, working papers); sharing information on how and why things occurred (technical reports and specifications, briefings, evaluations, project reports); describing and advocating for changes to public policy, practice or legislation (white papers, discussion papers, submissions); meeting statutory or other requirements for information sharing or management (<a href="">annual reports</a>, consultation documents); and many other reasons.
</p>
<p>
Organisations are often looking to create <a href="">the required output</a> and share it with <a href="">relevant parties</a> quickly and easily, without the delays and restrictions of academic journals or book publishing. There is often little incentive or justification for organisations or individual staff members to publish in academic journals or books, and often no need to charge for access to organisational outputs. Indeed, some information organisations may be required to make public. On the other hand grey literature is not necessarily always free, with market reports in particular, selling for thousands of dollars. This is however the exception, and on the whole though, grey literature, while costly to produce, is usually made available for free.
</p>
<p>
While the production and research quality may be extremely high (with the reputation of the organisation vested in the end product), the producing body, not being a formal publisher, generally lacks the channels for extensive distribution and bibliographic control.
</p>
<p>
Information and research professionals generally draw a distinction between ephemera and grey literature. However, there are <a href="">certain overlaps between the two media</a> and they undoubtedly <a href="">share common frustrations</a> such as bibliographic control issues. <a href="">Unique written documents</a> such as manuscripts and archives, and personal communications, are not usually considered to fall under the heading of <a href="">grey literature</a>, although <a href="">they again share some of the same problems</a> of control and access.
</p>

		</div>

<?php
}
?>
