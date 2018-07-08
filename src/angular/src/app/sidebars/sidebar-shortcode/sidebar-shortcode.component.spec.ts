import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SidebarShortcodeComponent } from './sidebar-shortcode.component';

describe('SidebarShortcodeComponent', () => {
  let component: SidebarShortcodeComponent;
  let fixture: ComponentFixture<SidebarShortcodeComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SidebarShortcodeComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SidebarShortcodeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
