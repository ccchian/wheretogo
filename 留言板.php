    <!--================ Testimonial Area  =================-->
    <section class="testimonial_area section_gap">
        <div class="container">
            <div class="anchors">
                <div class="section_title text-center">

                    <section id="s1">
                        <h2 class="title_color">評價留言區</h2>
                        <p>參加活動後有什麼感動或新奇的呢？歡迎留下你的參與經驗與大家分享 </p>
                        <div>
                        </div>
                        <form action="index/edit3.php" method="post" class="smart-green">
                            <h1>留言資訊
                                <span>請留下你的資訊</span>
                            </h1>
                            <label>
                                <span>姓名 :</span>
                                <input id="name" type="text" name="name" class="error" placeholder="請輸入您的姓名" />
                                <div class="error-msg"></div>
                            </label>

                            <label>
                                <span>電子信箱 :</span>
                                <input id="email" type="email" value="" name="email" placeholder="請輸入電子信箱email" />
                                <div class="error-msg"></div>
                            </label>

                            <label>
                                <span>留言 :</span>
                                <textarea id="message" name="message" placeholder="請輸入你的建議"></textarea>
                                <div class="error-msg"></div>
                            </label>

                            <div class="success-msg"></div>

                            <!-- <label>  
        <input type="submit" class="button" value="提交"/>
    </label> -->
                            <input type="hidden" name="command" value="insert">

                            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                確認送出
                            </button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">訊息</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            請再次確認輸入的訊息
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                </div>


                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>

                </div>
            </div>
        </div>
        </footer>

        </section>

        <!--================ End footer Area  =================-->