<?php

use App\Models\FeedBack;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use function Pest\Laravel\json;

test('test index method', function () {
  //load that in db
  $feedbacks = FeedBack::factory(2)->create();
  $feedbackIds = $feedbacks->map(fn ($feedback) => $feedback->id);

  //call index endpoint
  $response = json('get', '/api/feedbacks');

  //assert status
  $response->assertStatus(200);

  //verify record
  $data = $response->json('data.data');
  collect($data)->each(fn ($feedback) => $this->assertTrue(in_array($feedback['id'], $feedbackIds->toArray())));
});

test('test show method', function () {

  $dummy = FeedBack::factory()->create();

  $response = json('get', '/api/feedbacks/' . $dummy->id);

  $result = $response->assertStatus(200)->json('data');

  $this->assertEquals(data_get($result, 'id'), $dummy->id, 'Response ID not the same as model id.');
});

test('test create method', function () {

  $dummy = FeedBack::factory()->make();

  $response = json('post', '/api/feedbacks', $dummy->toArray());

  $result = $response->assertStatus(200)->json('data');

  $result = collect($result)->only(array_keys($dummy->getAttributes()));

  $result->each(function ($value, $field) use ($dummy) {
    $this->assertSame(data_get($dummy, $field), $value, 'Fillable is not the same.');
  });
});

test('test update method', function () {

  $dummy = FeedBack::factory()->create();
  $dummy2 = FeedBack::factory()->make();

  $fillables = collect((new FeedBack)->getFillable());

  $fillables->each(function ($toUpdate) use ($dummy, $dummy2) {

    $response = json('patch', '/api/feedbacks/' . $dummy->id, [
      $toUpdate  => data_get($dummy2, $toUpdate),
    ]);

    $result = $response->assertStatus(200)->json('data');

    $this->assertSame(data_get($dummy2, $toUpdate), data_get($dummy->refresh(), $toUpdate), 'Failed to update model');
  });
});

test('test delete method', function () {

  $dummy = FeedBack::factory()->create();

  $response = json('delete', '/api/feedbacks/' . $dummy->id);

  $result = $response->assertStatus(200)->json('data');

  $this->expectException(ModelNotFoundException::class);
  FeedBack::query()->findOrFail($dummy->id);
});
