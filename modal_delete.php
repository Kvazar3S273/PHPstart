<!-- Modal Delete-->
<!--<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content shadow" id="modalDeleteContent">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Видалення запису</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Ви дійсно бажаєте видалити?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-danger" id="btnDeleteNews">Видалити</button>-->
                <form action="delete.php" method="POST">
                    <input type='hidden' name='id' >
                    <button type="submit"
                            name="delete_submit"
                            id="btnDeleteNews"
                            class="btn btn-danger">Видалити</button>
                </form>
            </div>
        </div>
    </div>
</div>