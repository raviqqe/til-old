require 'xml-dsl'
require 'map-rec'
require 'rake/clean'
require 'redcarpet'
require 'rails'



def markdown_to_html markdown
  Redcarpet::Markdown::new(Redcarpet::Render::HTML).render markdown
end


def block_is_html &block
  array = map_rec(block_is_array(&block)) do |x|
    x.is_a?(Symbol) ? x.to_s.gsub(/_*$/, '').to_sym : x
  end

  XML::from_array array
end


rule '.html' => '.md' do |t|
  str = block_is_html do
    html do
      head do
        title "raviqqe's notes"
        link rel: 'stylesheet', href: 'https://raw.githubusercontent.com/hzlzh/MarkDown-Theme/master/CSS/GitHub-ReadMe.css'
        link rel: 'shortcut icon', href: '/favicon.ico', type: 'image/x-icon'
        link rel: 'icon', href: '/apple-touch-icon.png', type: 'image/x-icon'
      end

      body do
        p_
        hr
        div markdown_to_html(File.read t.source)
        hr
        div markdown_to_html("
          To the extent possible under law, the person who associated
          [The Unlicense](https://unlicense.org/UNLICENSE) with this work
          has waived all copyright and related or neighboring rights to this
          work.
        ".split.join ' ')
      end
    end
  end

  File.write t.name, str
end


task :default => Dir.glob('**/*.md').map { |filename| filename.ext '.html' }


CLEAN.include Dir.glob('**/*.html')
