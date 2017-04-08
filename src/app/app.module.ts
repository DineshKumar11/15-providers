import { NgModule, ErrorHandler } from '@angular/core';
import { IonicApp, IonicModule, IonicErrorHandler } from 'ionic-angular';
import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home';
import { IndexPage } from '../pages/index/index';
import {ServiceProvider} from '../providers/service-provider';

@NgModule({
  declarations: [
    MyApp,
     HomePage,
     IndexPage
  ],
  imports: [
    IonicModule.forRoot(MyApp)
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
    IndexPage
  ],
  providers: [ServiceProvider,{provide: ErrorHandler, useClass: IonicErrorHandler}]
})
export class AppModule {}
