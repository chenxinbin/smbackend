<!DOCTYPE html>
<html>
<head>
	<title>新闻公告</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="layui/css/layui.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />

</head>

<body>
	<div class="container">
		<section class="section layui-header">
			<div class="header">
				<a href="index.html" target="_blank" class="header_logo"><img src="images/logo.png" alt="logo" title="软淘" /></a>
				<ul class="layui-nav row_nav" id="row_nav">
					<li class="layui-nav-item">
						<a href="index.html">首页</a>
					</li>
					<li class="layui-nav-item">
						<a href="industryapplication.html">行业应用</a>
					</li>
					<li class="layui-nav-item">
						<a href="solution.html">解决方案</a>
					</li>
					<li class="layui-nav-item">
						<a href="cooperativeadv.html">合作优势</a>
					</li>
					<li class="layui-nav-item">
						<a href="aboutus.html">公司介绍</a>
					</li>
					<li class="layui-nav-item">
						<a href="storhelp.html">开店帮助</a>
					</li>
					<li class="layui-nav-item layui-this">
						<a href="newscenter.html">新闻公告</a>
					</li>
					<li class="layui-nav-item">
						<a href="contact.html">联系我们</a>
					</li>
					<!-- <li class="layui-nav-item">
						<a href="">注册登录</a>
					</li> -->
				</ul>
				<a href="##" class="header_Call" id="headerCall"><img src="images/Call.png" alt="客服" title="联系客服" /></a>
			</div>
			<button type="button" class="navbar-toggle collapsed">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </button>
			<ul class="layui-nav row_navs layui-nav-tree" id="row_navs">
				<li class="layui-nav-item">
					<a href="index.html">首页</a>
				</li>
				<li class="layui-nav-item">
					<a href="industryapplication.html">行业应用</a>
				</li>
				<li class="layui-nav-item">
					<a href="solution.html">解决方案</a>
				</li>
				<li class="layui-nav-item">
					<a href="cooperativeadv.html">合作优势</a>
				</li>
				<li class="layui-nav-item">
					<a href="aboutus.html">公司介绍</a>
				</li>
				<li class="layui-nav-item">
					<a href="storhelp.html">开店帮助</a>
				</li>
				<li class="layui-nav-item layui-this">
					<a href="newscenter.html">新闻公告</a>
				</li>
				<li class="layui-nav-item">
					<a href="contact.html">联系我们</a>
				</li>
				<!-- <li class="layui-nav-item">
					<a href="##">注册登录</a>
				</li> -->
			</ul>
		</section>
		<section class="">
			<!--新闻导航-->
		<div class="wyab-1">
           <div class="wyab-1-1">
                <span>当前位置： </span><span><a href="index.html">首页</a> &gt; <a href="newscenter.html">新闻动态</a></span>
           </div>
       </div>
       <div class="news-content wait-content" >
       	<div class="mains">
       		<div class="left-1">
       			<div class="left-3">
       				<div class="left-3-4-1">
                      <p class="left-3-4-1-t">新闻热点</p>
                    </div>     				
                    <div class="menuB">
					 <ul style="display:block;" class="one">
					 	@foreach($populars as $post)
						 <li>
							 <div class="left-3-ys">					   
							     <div class="left-3-ys-1"> 
								  <img src="https://smbackend.oss-cn-hangzhou.aliyuncs.com/zuo-j2.gif">
								 </div>
					            <div class="left-4-zy">
			                     <div class="left-4-t"><a href="{{route('frontend.view', ['post_id'=>$post->id])}}" title="">{{$post->title}}</a></div>
								 <div class="xin-ziti9">{{$post->excerpt}}</div>
								</div>	
		                	</div>
						 </li>	
						 @endforeach				 
					 </ul>
				    </div>	
       			</div>
       			<div class="left-3-4">
                      <div class="left-3-4-1">
                      <p class="left-3-4-1-t">热门标签</p>
                      </div>
                      <div class="left-3-4-2">
                      <a href="javascript:;" title="小程序"><p class="left-3-4-2-ziti">小程序</p></a>
                      </div>
                      <div class="left-3-4-2">
                      <a href="javascript:;" title="小程序卡"><p class="left-3-4-2-ziti">小程序卡</p></a>
                      </div>
                      <div class="left-3-4-3">
                      <a href="javascript:;" title="电信小程序"><p class="left-3-4-2-ziti">电信小程序</p></a>
                      </div>
                      <div class="left-3-4-3">
                      <a href="javascript:;" title="移动小程序"><p class="left-3-4-2-ziti">移动小程序</p></a>
                      </div>
              
                      <div class="left-3-4-3">
                       <a href="javascript:;" title="联通小程序"><p class="left-3-4-2-ziti">联通小程序</p></a>
                      </div>
                      <div class="left-3-4-3">
                      <a href="javascript:;" title="小程序流量卡"> <p class="left-3-4-2-ziti">小程序流量卡</p></a>
                      </div>                     
                      <div class="left-3-4-3">
                       <a href="javascript:;" title="小程序多少钱"><p class="left-3-4-2-ziti">小程序多少钱</p></a>
                      </div>
                      <div class="left-3-4-3">
                       <a href="javascript:;" title="小程序价格"><p class="left-3-4-2-ziti">小程序价格</p></a>
                      </div>                 
                      <div class="left-3-4-3">
                       <a href="javascript:;" title="小程序办理"><p class="left-3-4-2-ziti">小程序办理</p></a>
                      </div>
                      <div class="left-3-4-3">
                      <a href="javascript:;" title="小程序平台"><p class="left-3-4-2-ziti">小程序平台</p></a>
                      </div>                                              
                       <div class="left-3-4-3">
                       <a href="javascript:;" title="小程序SIM卡"><p class="left-3-4-2-ziti">小程序SIM卡</p></a>
                      </div>
                      <div class="left-3-4-3">
                      <a href="javascript:;" title="小程序卡供应商"><p class="left-3-4-2-ziti">小程序卡供应商</p></a>
                      </div>

					  <div class="left-3-4-3">
                       <a href="javascript:;" title="小程序卡应用"><p class="left-3-4-2-ziti">小程序卡应用</p></a>
                      </div>
                      <div class="left-3-4-3">
                      <a href="javascript:;" title="设备小程序卡"><p class="left-3-4-2-ziti">设备小程序卡</p></a>
                      </div>                      
					  <div class="left-3-4-3">
                       <a href="javascript:;" title="小程序卡哪家好"><p class="left-3-4-2-ziti">小程序卡哪家好</p></a>
                      </div>
                      <div class="left-3-4-3">
                      <a href="javascript:;" title="小程序卡服务商"><p class="left-3-4-2-ziti">小程序卡服务商</p></a>
                      </div>
                 </div>
							        			
       		</div>
       	    <div class="right-1">
       	    	<div class="layui-tab layui-tab-brief">
				  <ul class="layui-tab-title tabs-title" id="tabs-title">
				    <li class="boder-left"><a href="{{route('frontend')}}">全部</a></li>
				    @foreach($categorys as $category)
                    	<li class="boder-left"><a href="{{route('frontend.category', ['category_id'=>$category->id])}}">{{$category->name}}</a></li>
                    @endforeach
				  </ul>
				  <div class="layui-tab-content">
				    <div class="layui-tab-item  layui-show">
					    <ul class="mgt25">
					    	@foreach($posts as $post)
                            <li class="newslist">
					    		<div class="news-pic">
		                             <img  src="{{$post->featured_image}}"  border="0" >
		                        </div>
		                        <div class="news-rightcon">
                                  <div class="newslist-title">
                                  	<a href="{{route('frontend.view', ['post_id'=>$post->id])}}" title="">{{$post->title}}</a>
                                  </div>                                 
                                 <div class="newslist-text"> {{$post->title}}</div>
	                             <div class="newslist-feet ">
	                                 <span class="xin-ziti5 wait-feet">
	                                 	<img src="images/xw-5.gif">{{$post->published_at?$post->published_at:$post->created_at}}	                                 
	                                 </span>
	                                 <span class="xin-ziti5 wait-pad">
	                                 	<img src="images/xw-6.gif">{{$post->view_count}}
	                                 </span>
	                                 <a href="{{route('frontend.view', ['post_id'=>$post->id])}}"><span class="xin-ziti6">查看详情 &gt;</span></a>
	                              </div>
                                </div>
                                <div class="clearfix"></div>
					    	</li>
                            @endforeach
					    </ul>
					    {{ $posts->links() }}

				    </div>			    
				  </div>

              </div>
       	    </div>
       	    <div class="clearfix"></div>
       	</div>
       </div>
			
			
		</section>
		
		<section class="section section-footer text-center">
			<div class="footer-flex">
				<div class="footer-col-sm3 footer-col-xs6 footer-show">
					<div class="footer-cell">客服热线</div>
					<div class="footer-phone">0532-85990888</div>
					<p class="footer-phone footer-location">地址：青岛市黄岛区香江路优客美软件有限公司</p>
				</div>
				<div class="footer-col-sm3 footer-col-xs6 cutoff-rule"></div>
				<div class="footer-col-sm3 footer-col-xs6">
					<h6 class="color00bbf5">行业应用</h6>
					<div class="footer-cont">
						<div class="footer-row"><a href="solution.html">解决方案</a></div>
						<div class="footer-row"><a href="cooperativeadv.html">合作优势</a></div>
					</div>
				</div>
				<div class="footer-col-sm3 footer-col-xs6 cutoff-rule cutoff-rule2"></div>
				<div class="footer-col-sm3 footer-col-xs6">
					<h6 class="color00bbf5">关于我们</h6>
					<div class="footer-cont">
						<div class="footer-row"><a href="aboutus.html">公司简介</a></div>
						<div class="footer-row"><a href="storhelp.html">开店帮助</a></div>
					</div>
				</div>
				<div class="footer-col-sm3 footer-col-xs6 cutoff-rule"></div>
				<div class="footer-col-sm3 footer-col-xs6">
					<h6 class="color00bbf5">资讯中心</h6>
					<div class="footer-cont">
						<div class="footer-row"><a href="newscenter.html">新闻公告</a></div>
						<div class="footer-row"><a >注册登录</a></div>
					</div>
				</div>

				<div class="footer-col-sm3 footer-col-xs6 footer-hide">
					<div class="line-rule"></div>
					<div class="line-footer-cell">客服热线:0532-85990888</div>
					<p class="line-footer-location">地址：青岛市黄岛区香江路优客美软件有限公司</p>
				</div>
			</div>
		</section>
	</div>
	
	<!-- na-add -->
	<!--在线客服  -->
	<div class="scrollsidebar" id="scrollsidebar">
	  	<div class="side_content">
		    <div class="side_list">
		      	<div class="side_title"><a title="隐藏" class="close_btn"><span>关闭</span></a></div>
		      	<div class="side_center">
		        	<div class="other">
			          <p><img src="images/qrcode.png" width="120"/></p>
			          <p>客户服务热线</p>
			          <p>0532-85990888</p>
			        </div>
			        <div class="msgserver">
			          	<p><a href="contact.html">联系我们</a></p>
			        </div>
		      	</div>
		      	<div class="side_bottom"></div>
		    	</div>
		 	</div>
  		<div class="show_btn"><span>在线客服</span></div>
	</div>
	<script type="text/javascript" src="js/kefu.js"></script>
	<!-- na-add end -->

	<a href="#" id="ui-to-top" class="ui-to-top active layui-icon">&#xe619</a>
	<script src="layui/layui.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/js.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">

       </script>
</body>
</html>