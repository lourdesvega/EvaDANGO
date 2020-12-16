<div class="modal fade" id="modalControl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ver control</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-10 order-xl-1">


                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Nuevo referencial</label>
                            <div class="col-sm-4">
                                <input type="text" id="referencial" name="referencial" value="" readonly class="form-control"
                                    style="background: white">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Riesgos de dominio</label>
                            <div class="col-sm-8">
                                <input type="text"id="riesgosDominio" name="riesgosDominio" value="" readonly class="form-control"
                                    style="background: white">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Riesgos clave relacionados</label>
                            <div class="col-sm-8">
                                <input type="text" value="" id="riesgosClave" name="riesgosClave" readonly class="form-control"
                                    style="background: white">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Objetivos de control</label>
                            <div class="col-sm-8">
                                <textarea name="objetivo" id="objetivo" readonly class="form-control"
                                    style="background: white"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Guía sobre la actividad de control para mitigar
                                el
                                riesgo</label>
                            <div class="col-sm-8">
                                <textarea id="guia"  name="guia" readonly class="form-control"
                                    style="background: white"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Area</label>
                            <div class="col-sm-5">
                                <input type="text" id="area_id" name="area_id" readonly class="form-control"
                                    style="background: white">
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Activo</label>
                            <div class="col-sm-3">
                                <input id="activo" style="background: white" readonly class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>