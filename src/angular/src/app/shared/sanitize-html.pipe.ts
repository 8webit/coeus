import { Pipe, PipeTransform } from '@angular/core';
import {DomSanitizer, SafeHtml} from '@angular/platform-browser';

@Pipe({name: 'sanitizeHtml'})
export class SanitizeHtmlPipe implements PipeTransform {
    transform(value: string): SafeHtml {
        return this.santize.bypassSecurityTrustHtml(value);
    }

    constructor (private santize: DomSanitizer) { }
}