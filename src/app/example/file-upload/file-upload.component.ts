import {Component,OnInit, ElementRef, ViewChild} from '@angular/core';
import {FormBuilder, FormGroup, Validators} from "@angular/forms";
 
import { Http, Response } from '@angular/http';
import { Headers, RequestOptions } from '@angular/http';
import { Observable }  from "rxjs/Observable";
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/toPromise';

@Component({
  selector: 'app-file-upload',
  templateUrl: './file-upload.component.html',
  styleUrls: ['./file-upload.component.css']
})
export class FileUploadComponent implements OnInit {
      form: FormGroup;
      loading: boolean = false;
      private  postFormData: any; 

      @ViewChild('fileInput') fileInput: ElementRef;
  
      ngOnInit() {
      }
 
      constructor(private http:Http,private fb: FormBuilder) {
        this.createForm();
      }

      createForm() {
        this.form = this.fb.group({
          name: ['', Validators.required],
          avatar: null
        });
      }

      onFileChange(event) {
        
        if(event.target.files.length > 0) {
          let file = event.target.files[0];
           
          this.form.get('avatar').setValue(file);
         
        }
      }

      private prepareSave(): any {
        this.postFormData = new FormData();
        this.postFormData.append('name', this.form.get('name').value);
        this.postFormData.append('avatar', this.form.get('avatar').value);
        console.log(this.form);
        console.log(this.postFormData);
        return this.postFormData;
      }

      onSubmit() {
        const formModel = this.prepareSave();
         console.log(' FormModel  : '+this.postFormData);
        this.loading = true;
        // In a real-world app you'd have a http request / service call here like
        // this.http.post('apiUrl', formModel)
         this.http.post('http://localhost/ngcrud-php/fileupload.php', this.postFormData)
          .subscribe(data=>
            {
              console.log(data);
            }
              
          );

        setTimeout(() => {
          // FormData cannot be inspected (see "Key difference"), hence no need to log it here
          alert('done!');
          this.loading = false;
        }, 1000);
      }

      clearFile() {
        this.form.get('avatar').setValue(null);
        this.fileInput.nativeElement.value = '';
      }      


}
