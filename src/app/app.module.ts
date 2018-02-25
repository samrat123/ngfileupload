import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { FileUploadComponent } from './example/file-upload/file-upload.component';
import { HttpModule } from '@angular/http';
import { FormdataUploadComponent } from './example/formdata-upload/formdata-upload.component';

@NgModule({
  declarations: [
    AppComponent,
    FileUploadComponent,
    FormdataUploadComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    ReactiveFormsModule,
    HttpModule
      
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
