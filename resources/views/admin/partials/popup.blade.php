<!-- title popup -->
<div class="modal fade bd-example-modal-sm-title1" id="invitationCodeModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="mySmallModalLabel">Add Invitation Code</h4>
            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{ route('invitation.store') }}" class="theme-form" method="post">
            @csrf
            <div class="modal-body dark-modal">
               <label for="invitation_code" class="form-label">Invitation Code</label>
               <input type="text" class="form-control" name="invite_code" id="invitation_code">
               <button type="button" class="mt-3 btn btn-primary generate-code">Generate Code</button>
               <button class="mt-3 btn btn-success" type="submit">Save</button>
               <script>
                  const generateCode = document.querySelector('.generate-code');
                  const invitationCode = document.querySelector('#invitation_code');
                  
                  generateCode.addEventListener('click', () => {
                      const alphaNum = '0123456789abcdefghijklmnopqrstuvwxyz';
                      let code = '';
                      for (let i = 0; i < 10; i++) {
                          if (i % 2 === 0) {
                              code += alphaNum[Math.floor(Math.random() * 10)];
                          } else {
                              code += alphaNum[Math.floor(Math.random() * 26) + 10];
                          }
                      }
                      invitationCode.value = code;
                  });
                </script>
            </div>
        </form>
    </div>
</div>
<!-- Prohibition of transactions -->