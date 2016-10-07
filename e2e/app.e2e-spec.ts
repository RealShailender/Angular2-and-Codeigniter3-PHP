import { A2phpPage } from './app.po';

describe('a2php App', function() {
  let page: A2phpPage;

  beforeEach(() => {
    page = new A2phpPage();
  });

  it('should display message saying app works', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('app works!');
  });
});
