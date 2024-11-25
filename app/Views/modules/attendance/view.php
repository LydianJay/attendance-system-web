<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body" id="pdfContent">
                <h5 class="card-title">Attendance</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <?php foreach ($table_head as $head) { ?>
                                <th> <?php echo $head ?> </th>

                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($attendance as $at) { ?>
                            <tr>
                                <th> <?php echo $at->fname . ' ' . $at->lname ?> </th>
                                <th> <?php echo $at->date ?> </th>
                                <th> <?php echo $at->time ?> </th>
                                <th> <?php echo $at->type == 1 ? 'Check In' : 'Check Out' ?> </th>
                            </tr>
                        <?php } ?>

                    </tbody>

                </table>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary btn-sm" id="download">PDF</button>
            </div>
        </div>
    </div>
</div>