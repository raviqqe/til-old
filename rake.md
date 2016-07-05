# Rake

## Tasks can be nested

```
task :default => [:foo, :baz]

task :foo do
  task :bar do
    puts "bar"
  end
  puts "foo"
end

task :baz => :bar do
  puts "baz"
end
```
