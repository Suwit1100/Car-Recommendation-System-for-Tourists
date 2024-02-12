    {{-- qt 1 --}}
    <div class="qt-sex">
        <div class="row d-flex justify-content-center">
            <div class="col-12 mt-5">
                <h5 class="text-center">โปรดเลือกเพศของคุณ 1/18</h5>
            </div>
        </div>
        {{-- ก่อนหน้า ถัดไป --}}
        <div class="row mt-1 pt-3 d-flex justify-content-center">
            <div class="col-6 ">
                <button class="btn btn-next-pre" id="test-btn-log">
                    <i class="fa-solid fa-circle-left"></i>
                </button>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <button class="btn btn-next-pre" id="btn-next-old" disabled>
                    <i class="fa-solid fa-circle-right"></i>
                </button>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-6 col-lg-2 my-1">
                <input type="radio" class="btn-check" name="sex" id="male" autocomplete="off" value="male">
                <label class="box-lable" for="male">
                    <i class="bi bi-check px-1 mt-1"></i>
                    <div class="box-img text-center mt-2">
                        <img src="https://www.forthwithlife.co.uk/wp-content/uploads/2021/12/Blog-Headers-2.png">
                    </div>
                    <div class="box-text">
                        <h6 class="text-center">ชาย</h6>
                    </div>
                </label>
            </div>
            <div class="col-6 col-lg-2 my-1">
                <input type="radio" class="btn-check" name="sex" id="female" autocomplete="off" value="female">
                <label class="box-lable" for="female">
                    <i class="bi bi-check px-1 mt-1"></i>
                    <div class="box-img text-center mt-2">
                        <img
                            src="https://womensagenda.com.au/wp-content/uploads/2023/09/Screenshot-2023-09-12-at-2.11.54-PM-1024x932.png">
                    </div>
                    <div class="box-text">
                        <h6 class="text-center">หญิง</h6>
                    </div>
                </label>
            </div>
            <div class="col-6 col-lg-2 my-1">
                <input type="radio" class="btn-check" name="sex" id="lgbt" autocomplete="off" value="lgbt">
                <label class="box-lable" for="lgbt">
                    <i class="bi bi-check px-1 mt-1"></i>
                    <div class="box-img text-center mt-2">
                        <img
                            src="https://akm-img-a-in.tosshub.com/indiatoday/images/story/202306/stavrialena-gontzou-68y-orxey_y-unsplash-sixteen_nine.jpg?VersionId=FNSTF9MIE4dHiaOJEsd8jXySJpmg4WvA&size=690:388">
                    </div>
                    <div class="box-text">
                        <h6 class="text-center">เพศทางเลือก</h6>
                    </div>
                </label>
            </div>
            <div class="col-6 col-lg-2 my-1">
                <input type="radio" class="btn-check" name="sex" id="not-like" autocomplete="off" value="no">
                <label class="box-lable" for="not-like">
                    <i class="bi bi-check px-1 mt-1"></i>
                    <div class="box-img text-center mt-2">
                        <img
                            src="data:image/jpeg;base64,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">
                    </div>
                    <div class="box-text">
                        <h6 class="text-center">ไม่ต้องการระบุ</h6>
                    </div>
                </label>
            </div>
        </div>
    </div>
