/**
 * Created by PhpStorm.
 * User: nemzag aka Gazmen Arifi
 * Date: 2018-10-02
 * Time: 12:47
 */

 tocbot.init({
	// Where to render the table of contents.
	tocSelector: '.js-toc',
	// Where to grab the headings to build the table of contents.
	contentSelector: '.js-toc-content',
	// Which headings to grab inside of the contentSelector element.
	headingSelector: 'h1, h2, h3, h4, h5, h6'
});

 tocbot.refresh();