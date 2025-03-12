  <!-- make an appointment -->
  <div class="modal fade" id="exampleModalpermission" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-body">
                  <div class="modal-toggle-wrapper">
                      <h4>Matching Order</h4>
                      <div class="modal-img"> <img src="../assets/images/gif/online-shopping.gif" alt="online-shopping"></div>
                      <h3 class="text-sm-center">You have no Permission</h3>
                      <div class="">
                          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Go Back</button>
                          <button class="btn btn-primary" type="button">Login First </button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- title popup -->
  <div class="modal fade bd-example-modal-sm-title1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="mySmallModalLabel">Add Invitation</h4>
                  <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" class="theme-form" method="post">
                  <div class="modal-body dark-modal">


                      <label for="invitation_code" class="form-label">Invitation Code</label>
                      <input type="text" class="form-control" name="invitation_code" id="invitation_code">

                      <!-- <h5 class="">Generate Code</h5> -->
                      <button type="button"  class="mt-3 btn btn-primary generate-code">Generate Code</button>
                      <div class="mt-2">
                          <div class="d-flex align-items-center">
                              <input type="text" class="form-control flex-grow-1" id="generated-code" readonly>
                              <button type="button" class="btn btn-secondary copy-code" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy"><i class="fa-regular fa-clipboard"></i></button>
                          </div>
                      </div>

                      <script>
                          const generateCode = document.querySelector('.generate-code');
                          const generatedCode = document.querySelector('#generated-code');
                          const invitationCode = document.querySelector('#invitation_code');

                          generateCode.addEventListener('click', () => {
                              const code = Math.random().toString(36).substring(2, 12);
                              generatedCode.value = code;
                              invitationCode.value = code;
                          });
                       
                    //       const generateCode = document.querySelector('.generate-code');
                    //       const generatedCode = document.querySelector('#generated-code');
                    //       const copyCode = document.querySelector('.copy-code');

                    //       generateCode.addEventListener('click', () => {
                    //           const code = Math.random().toString(36).substring(2, 12);
                    //           generatedCode.value = code;
                    //       });

                          copyCode.addEventListener('click', () => {
                              navigator.clipboard.writeText(generatedCode.value);
                              copyCode.setAttribute('title', 'Copied!');
                              setTimeout(() => {
                                  copyCode.setAttribute('title', 'Copy');
                              }, 2000);
                          });
                      </script>

                  </div>
                  <div class="modal-footer">    
                      <button class="btn btn-primary" type="submit">Submit </button>
                      <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  <div class="modal fade bd-example-modal-sm-title" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="mySmallModalLabel">Information</h4>
                  <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body dark-modal">

                  <h5 class="">Confirm the ban?</h5>

              </div>
              <div class="modal-footer">
                  <button class="btn btn-primary" type="button">Sure </button>
                  <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
              </div>
          </div>
      </div>
  </div>

  <!-- Prohibition of transactions -->
  <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="mySmallModalLabel">Information</h4>
                  <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body dark-modal">

                  <h5 class="">Are you sure to ban this user from trading?</h5>

              </div>
              <div class="modal-footer">
                  <button class="btn btn-primary" type="button">Sure </button>
                  <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
              </div>
          </div>
      </div>
  </div>

  <!-- Ban invitations -->
  <div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="mySmallModalLabel">Information</h4>
                  <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body dark-modal">

                  <h5 class="">Are you sure you want to ban user invitations?</h5>

              </div>
              <div class="modal-footer">
                  <button class="btn btn-primary" type="button">Sure </button>
                  <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
              </div>
          </div>
      </div>
  </div>