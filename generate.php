<?php 
/* 
vinigomescunha at gmail
generator :p
*/
Class BuildInfo {
	public static $file;
	public static $data;
	public static function get() {
		$json = file_get_contents(self::$file); 
		return json_decode($json, true);
	} 
	public static function generate() {
		$json = json_encode(self::$data); 
		file_put_contents(self::$file, $json);
	} 
};

BuildInfo::$data = ["title" => "Json Generate", "footer" => " This is My Blog! " ];
BuildInfo::$file = "info.json";
BuildInfo::generate();

BuildInfo::$data = [];
BuildInfo::$file = "posts.json";
if((isset($_GET['title']) && !empty($_GET['title'])) &&
	(isset($_GET['content']) && !empty($_GET['content']))) {
	BuildInfo::$data = BuildInfo::get();
	BuildInfo::$data[] = ["title" => $_GET['title'], "content" => $_GET['content'] ];

} else if(isset($_GET['reset']) && !empty($_GET['reset'])){
	BuildInfo::$data = [
		["title" => "The Lorem Ipsum", 
			"content" => " Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Quisque volutpat condimentum velit.Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.Suspendisse potenti. Etiam ultrices. " 
		],
		["title" => "Curabitur tortor",
			"content" => " Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nunc feugiat mi a tellus consequat imperdiet. " 
		],
		["title" => "Nam nec ante. ", "content" => " Sed lacinia, urna non tincidunt mattis, tortor neque adipiscing diam, a cursus ipsum ante quis turpis. Nulla facilisi. Ut fringilla. Nulla quis sem at nibh elementum imperdiet.  Nulla metus metus, ullamcorper vel, tincidunt sed. Vestibulum sapien. Proin quam." 
		], 
		["title" => "Duis sagittis ipsum.", "content" => "Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse in justo eu magna luctus suscipit."
		],
		["title" => "Curabitur sodales ligula in libero.", "content" => "Sed dignissim lacinia nunc.Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa. Fusce ac turpis quis ligula lacinia aliquet. Mauris ipsum, euismod in, nibh. Sed lectus. Integer euismod lacus luctus magna" ]
	];
}
BuildInfo::generate();


