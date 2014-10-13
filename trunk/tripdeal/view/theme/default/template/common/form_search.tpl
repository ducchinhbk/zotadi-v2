<div class="wrapSearch">
    <div class="container">
    <form action="/<?php echo DIR_ROOT_NAME ?>/?route=common/search" method="post">
        <div class="searchBox">
            <div class="form_controls">
                <label for="tourname">Tìm nhanh tour du lịch</label>
                <input type="text" class="textbox" placeholder="Nhập tên tour du lịch.." name="tourname" value="" id="tourname" style="width: 195px;">
                <input type="hidden" name="sbk_href" value="">
                <input type="hidden" id="manual_submit" name="manual_submit" value="false">
            </div>
            <div class="form_controls">
                <label>Điểm khởi hành</label>
                <select class="selectbox idSelectbox">
                    <option selected="" value="">Tỉnh/TP</option>
                    <option value="2">TPCHM</option>
                    <option value="3">Hà nội</option>
                    <option value="4">Cần thơ</option>
                    <option value="5">Hải Phòng</option>
                    <option value="6">Đà nẵng</option>
                    <option value="7">Đồng nai</option>
                    <option value="8">Nha trang</option>
                    <option value="9">Huế</option>

                </select>
            </div>
            <div class="form_controls">
                <label for="arrivedCountry">Điểm đến</label>
                <select class="selectbox idSelectbox">
                    <option selected="" value="">Quốc gia</option>
                    <option value="1">Việt nam</option>
                    <option value="2">Sigapore</option>
                    <option value="3">Úc</option>
                    <option value="4">Hàn quốc</option>
                    <option value="5">Thái lan</option>
                    <option value="6">Campuchia</option>
                    <option value="7">Lào</option>
                    <option value="8">Philipine</option>
                    <option value="9">Indonesia</option>

                </select>
            </div>
            <div class="form_controls">
                <label for="arrivedCity"> Điểm đến </label>
                <select class="selectbox idSelectbox">
                    <option selected="" value="">Tỉnh/TP</option>
                    <option value="2">TPCHM</option>
                    <option value="3">Hà nội</option>
                    <option value="4">Cần thơ</option>
                    <option value="5">Hải Phòng</option>
                    <option value="6">Đà nẵng</option>
                    <option value="7">Đồng nai</option>
                    <option value="8">Nha trang</option>
                    <option value="9">Huế</option>
                </select>
            </div>
            <div class="form_controls">
                <input type="submit" value="Tìm kiếm" class="submit">
                <input type="hidden" value="false" class="bnrsearch">
            </div>
            <div class="clearfix"></div>
        </div><!--end search box-->
        <div class="clearfix"></div>
        </form>
    </div>
</div>