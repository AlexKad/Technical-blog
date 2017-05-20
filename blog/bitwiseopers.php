<?php
$page_description='A  professional blog of Aleksandra Orlova - an experienced independent web developer. Notes about javascript bitwise operators and where we can use them.';
$page_keywords='javscript; bitwise operators;';
include('templates/header.php');
?>
<section class="main container">
	<div class="article">
		<h2>Javascript bitwise operators and how to use them</h2>
		<p>The majority of javascript developers knows about bitwise operators and binary representations of numbers. However if you asked them where in web development we can use those operators you rarely hear a clear answer. So was I until I started to use bitwise operators in one project where we had to grant and control different user roles on the webportal.</p>
		<p>But let's start from the very beginning. If you familiar enough with bitwise operators and how they work you can <a href="#usage" class="slide">skip to the practice part</a>.</p>
		<div id="theoria">
			<p>As you may know every number has it binary representation. Javascript has method <code>.toString(2)</code> (argument 2 means base) that allows to convert number from decimal to binary represantation. Also you can use <code>parseInt('0100', 2)</code> method to convert from binary number to decimal.</p>
			<iframe style="width: 100%; height: 200px; " src="https://jsfiddle.net/alex_o/fakyv29q/5/embedded/js,result/" allowfullscreen="allowfullscreen" frameborder="0"></iframe>
			<p>There are seven bitwise operators in Javascript. Each of this operator works only with binary representation of numbers. Operators with 2 operands (like a&amp;b, a|b) work with pair of bits, where the first bit comes from first operand and the second bit comes from the same position of the second operand.</p>
			<ol>
				<li><h4>Operator AND &amp;</h4>
					<p>Operator returns 1 only if both bits form pair are 1, otherwise returns 0.</p>
					<table class="example">
						<tr>
							<td>Decimal number</td>
							<td colspan="4">Binary number</td>
						</tr>
						<tr>
							<td>4</td>
							<td>0</td>
							<td>1</td>
							<td>0</td>
							<td>0</td>
						</tr>
						<tr>
							<td>&amp;</td>
							<td colspan="4">&amp;</td>
						</tr>
						<tr>
							<td>7</td>
							<td>0</td>
							<td>1</td>
							<td>1</td>
							<td>1</td>
						</tr>
						<tr>
							<td>4</td>
							<td>0</td>
							<td>1</td>
							<td>0</td>
							<td>0</td>
						</tr>
					</table>
				</li>
				<li><h4>Operator OR |</h4>
					<p>Operator returns 1 if at least one bit from pair is 1. In another words, operator returns 0 if both bits from pair are 0, otherwise returns 1.</p>
					<table class="example">
						<tr>
							<td>Decimal number</td>
							<td colspan="4">Binary number</td>
						</tr>
						<tr>
							<td>4</td>
							<td>0</td>
							<td>1</td>
							<td>0</td>
							<td>0</td>
						</tr>
						<tr>
							<td>|</td>
							<td colspan="4">|</td>
						</tr>
						<tr>
							<td>7</td>
							<td>0</td>
							<td>1</td>
							<td>1</td>
							<td>1</td>
						</tr>
						<tr>
							<td>7</td>
							<td>0</td>
							<td>1</td>
							<td>1</td>
							<td>1</td>
						</tr>
					</table>
				</li>
				<li><h4>Operator NOT ~</h4>
					<p>Returns the opposite bit. If there is 1 at the i position, result will contain 0 at the i position, if 0 result will contain 1.</p>
					<table class="example">
						<tr>
							<td>Decimal number</td>
							<td colspan="5">Binary number</td>
						</tr>
						<tr>
							<td>9</td>
							<td>0000 0000 0000 0000 0000 0000 0000</td>
							<td>1</td>
							<td>0</td>
							<td>0</td>
							<td>1</td>
						</tr>
						<tr>
							<td>~</td>
							<td colspan="5">~</td>
						</tr>
						<tr>
							<td>-10</td>
							<td>1111 1111 1111 1111 1111 1111 1111</td>
							<td>0</td>
							<td>1</td>
							<td>1</td>
							<td>0</td>
						</tr>						
					</table>
					<p>Actually in Javascript <code>~n == -(n+1)</code></p>
				</li>
				<li><h4>Operator XOR ^</h4>
					<p>Returns 1 only if the bits are different, otherwise returns 0.</p>
					<table class="example">
						<tr>
							<td>Decimal number</td>
							<td colspan="4">Binary number</td>
						</tr>
						<tr>
							<td>5</td>
							<td>0</td>
							<td>1</td>
							<td>0</td>
							<td>1</td>
						</tr>
						<tr>
							<td>^</td>
							<td colspan="4">^</td>
						</tr>
						<tr>
							<td>7</td>
							<td>0</td>
							<td>1</td>
							<td>1</td>
							<td>1</td>
						</tr>
						<tr>
							<td>2</td>
							<td>0</td>
							<td>0</td>
							<td>1</td>
							<td>0</td>
						</tr>
					</table>
				</li>
				<li><h4>Left shift (Zero fill) &lt;&lt; </h4>
					<p>This operator pushes in from the right one or more zero bits, and the leftmost bits fall off</p>
					<table class="example">
						<tr>
							<td>Decimal number</td>
							<td>Binary number</td>
						</tr>
						<tr>
							<td>5</td>
							<td class="text-left">0 0 1 0 1</td>
						</tr>
						<tr>
							<td>5&lt;&lt;1</td>
							<td class="text-left">0 1 0 1 0</td>
						</tr>
					</table>
					<p>In most cases left shift &lt;&lt; n works the same way as multiply number by 2 n times. But you must remember that operators works with 32bit signed numbers, so <code>10000000000 &lt;&lt; 1</code> will return -1474836480, not 20000000000.</p>
					<iframe src="https://jsfiddle.net/alex_o/k799rz9a/embedded/js,result/"  width="100%" height="150px" frameborder="0"></iframe>
				</li>
				<li><h4>Signed right shift &gt;&gt;</h4>
					<p>This is a sign preserving right shift. Copies of the leftmost bit are pushed in from the left, and the rightmost bits fall off:</p>
					<table class="example">
						<tr>
							<td>Decimal number</td>
							<td>Binary number</td>
						</tr>
						<tr>
							<td>5</td>
							<td class="text-left">0 0 1 0 1</td>
						</tr>
						<tr>
							<td>5 &gt;&gt; 1</td>
							<td class="text-left">0 0 0 1 0</td>
						</tr>
					</table>
					<p>In most cases left shift &gt;&gt; n works the same way as divide number by 2 n times. </p>
					<iframe src="https://jsfiddle.net/alex_o/L525c7v6/embedded/js,result/"  width="100%" height="150px" frameborder="0"></iframe>
				</li>
				<li><h4>Zero fill right shift &gt;&gt;&gt;</h4>
					<p>One or more zero bits are pushed in from the left, and the rightmost bits fall off. For the postitve numbers works the same as &gt;&gt; operator, because in both cases it pushes zero bits. </p>
					<table class="example">
						<tr>
							<td>Decimal number</td>
							<td>Binary number</td>
						</tr>
						<tr>
							<td>-9</td>
							<td class="text-left">1111 1111 1111 1111 1111 1111 1111 0111</td>
						</tr>
						<tr>
							<td>-9 &gt;&gt;&gt; 2 = 1073741821</td>
							<td class="text-left">0011 1111 1111 1111 1111 1111 1111 1101</td>
						</tr>
					</table>
					<iframe src="https://jsfiddle.net/alex_o/e1ussdej/embedded/js,result/" width="100%" height="150px" frameborder="0"></iframe>
				</li>
			</ol>
		</div>
		<div id="usage">
			<h3>Practical use</h3>
			<p>Usually bitwise operators in javascript are used for masks/flags, rarer for work with numbers, RGB(A) values, communication over ports/sockets and for compression and encryption. </p>
			<ol>
				<li><h4>Mask</h4>
					<p>Let's imagine that we have different users on 1 webportal: admin, editor, author and guest. Understandable, that every role has different access level and different capabilities:</p>
					<table class="roles">
						<tr>
							<td>Role</td>
							<td>Can Read</td>
							<td>Can Write</td>
							<td>Can Delete</td>
							<td>Can manage users</td>
						</tr>
						<tr>
							<td>Guest</td>
							<td>1</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Editor</td>
							<td>1</td>
							<td>1</td>
							<td>0</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Author</td>
							<td>1</td>
							<td>1</td>
							<td>1</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Admin</td>
							<td>1</td>
							<td>1</td>
							<td>1</td>
							<td>1</td>
						</tr>
					</table>
					<p>As you can see from this table every access can be represented as decimal number:</p>
					<ul style="list-style:none;">
						<li><pre>guest   = 1000 (base 2) = 8 (base 10)</pre></li>
						<li><pre>editor = 1100 (base 2) = 12 (base 10)</pre></li>
						<li><pre>author = 1110 (base 2) = 14 (base 10)</pre></li>
						<li><pre>admin  = 1111 (base 2) = 16 (base 10)</pre></li>
					</ul>
					<p>This approach gives us a lot of advantages. First of all it saves memory because we keep all information about granted capabilities in one decimal number, second it simplify the way we can check granted access.</p>
					<p>From the table above we can represent our accesses as a decimal numbers too: </p>
					<ul>
						<li>If any role has access_manage, it should have 1 on the 1 position (reading from right to left). So we can represent aceess_manage = 0001 (base 2). </li>
						<li>If any role has access_delete, it sholud have 1 on the 2 position (reading from right to left). So it is access_delete = 0010 (base 2).</li>
						<li>access_edit = 0100</li>
						<li>access_read = 1000</li>
					</ul>
					<p>So, if user has access with 1 on 1,2 and 3 position, we can say that he can read, edit and delete article.</p>
					<iframe src="https://jsfiddle.net/alex_o/knh64px4/10/embedded/js,result/" width="100%" height="400px" frameborder="0"></iframe>
					<p>Maybe at first glance this approach seems to be difficult, but if you understand it once, you will notice how it helps to work with roles in easy and elegant way. The only thing you should remember while working with mask, that JavaScript works only with 32 bit numbers.</p>
				</li>
				<li><h4>Work with RGB(A)</h4>
					<p>RGBA is one of the color model, with extra alpha channel, which is normally used for opacity. Color can be represented as a single 32-bit unsigned integer that  has the alpha sample in the highest 8 bits, followed by the red sample, green sample and finally the blue sample in the lowest 8 bits. Normally we set color in the CSS, smth like <code>background-color:rgba(255,0,0,0.3);</code>, but when you work for example with HTML5 canvas element, you might have to work with color right inside javascript. And bitwise operators definetly will help you here.</p>
					<iframe src="https://jsfiddle.net/alex_o/bL5ggd97/embedded/js,result/" width="100%" height="250px;" frameborder="0"></iframe>
				</li>
				<li><h4>Work with numbers and creative solutions</h4>
					<p>Some developers prefer to use bitwise operators for rounding numbers. Technically it will work and sometimes it will be faster than <code>Math.floor()</code> or <code>Math.round()</code> But there are some problems in this approach. Let me show you:</p>
					<iframe src="https://jsfiddle.net/alex_o/awytdagr/embedded/js,result/" width="100%" height="250px" frameborder="0"></iframe>
					<p>Probably you will remember all these problems and use bitwise operators only when they will work safely, but why don't you use <code>Math.floor()</code> or <code>Math.round()</code>?</p>
					<p>Also several times I saw bitwise operators used for elegant solution of interview questions. Like swap two values, without using additional variable:</p>
					<iframe src="https://jsfiddle.net/alex_o/3aqnj98p/embedded/js,result/" width="100%" height="250px" frameborder="0"></iframe>
					<p>It might work good enough for demostrating your skills in the interview, but in real life it would cause additional problems. How long will junior developer from your team understand the following code:</p>
					<iframe src="https://jsfiddle.net/alex_o/sdkm03xw/embedded/js,result/" width="100%" height="250px;" frameborder="0"></iframe>
					<p>In another words bitwise operators give us amazing force to operate with numbers, but we should use it wisely to keep our code clean and maintainable.</p>
				</li>
			</ol>
		</div>			
	</div>
	<div id="disqus_thread"></div>
	<script>

	disqus_config = function () {
		this.page.url = 'http://aleksandraweb.com/blog/bitwiseopers.php';
		this.page.identifier = 'article_bitwiseopers';
	};
	
	(function() { // DON'T EDIT BELOW THIS LINE
	var d = document, s = d.createElement('script');
	s.src = 'https://blogtalk-1.disqus.com/embed.js';
	s.setAttribute('data-timestamp', +new Date());
	(d.head || d.body).appendChild(s);
	})();
	</script>
	<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	
	</section>

<?php
include('templates/footer.html');
?>